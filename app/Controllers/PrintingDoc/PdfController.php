<?php

namespace App\Controllers\PrintingDoc;

use App\Controllers\BaseController;
use App\Controllers\AdminControlpage\Ecommerce\Purchase\Purchase;
use App\Libraries\MY_TCPDF as TCPDF;
// use TCPDF;


class PdfController extends BaseController
{
    // protected $purchasecontrol;

    // public function __construct()
    // {
    //     $this->purchasecontrol = new Purchase();
    // }

    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function print_PO($link)
    {

        $no_purchase = substr($link, 0, 6) . "/" . substr($link, 6, 1) . "/" . substr($link, 7, 2) . "/" . substr($link, 9);
        // dd($no_purchase);








        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('admin.qearaf.com');
        $pdf->SetTitle('Purchase Order ' . $no_purchase);
        $pdf->SetSubject('Purchase Order ' . $no_purchase);
        $pdf->SetKeywords('Purchase Order ' . $no_purchase);

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // QRCODE,H : QR-CODE Best error correction
        $linkbarcode = base_url() . 'print/po/230907P020D8E6EEF';
        $pdf->write2DBarcode($linkbarcode, 'QRCODE,H', 0, 3, 20, 20, ['position' => 'R'], 'N');
        $style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $pdf->Line(15, 25, 195, 25, $style);
        $pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
        //view mengarah ke invoice.php

        // $html = view('pages_admin/pdf_form_purchase_order');
        $html = $this->htlmPO($no_purchase);

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('invoice-pos-sobatcoding.pdf', 'I');
    }

    public function htlmPO($no_purchase)
    {
        $purchasedata = new Purchase();  //create object 
        $datapo = $purchasedata->getdata_print($no_purchase);
        // dd($datapo);
        // dd($datapo['ifp']->name_supplier);
        // number_format($i->bill, 0, ',', '.')

        for ($a = 0; $a < count($datapo['dpl']); $a++) {
            $row[] = '
            <tr>
            <td style="height: 20px">' . $datapo['dpl'][$a]->pro_name . ' ' . $datapo['dpl'][$a]->pro_model . '</td>
            <td style="height: 20px;text-align:center">' . $datapo['dpl'][$a]->pro_qty . '</td>
            <td style="height: 20px;">PCS</td>
            <td style="height: 20px;text-align:right">' . number_format($datapo['dpl'][$a]->pro_price_basic, 0, ',', '.') . '</td>
            <td style="height: 20px;text-align:right">0</td>
            <td style="height: 20px;text-align:right">' . number_format($datapo['dpl'][$a]->pro_price_basic * $datapo['dpl'][$a]->pro_qty, 0, ',', '.') . '</td>
            </tr>';
            $arraytotal[] = $datapo['dpl'][$a]->pro_price_basic * $datapo['dpl'][$a]->pro_qty;
        };

        $data = '
            <table cellpadding="0">
                <tr>
                    <th width="40%"><p>No&nbsp;&nbsp;&nbsp;&nbsp;: <b style="font-size:11pt;">' . $no_purchase . '</b><br />Date : ' . $datapo['ifp']->date_purchase . '</p></th>
                    <th width="20%"></th>
                    <th width="40%"><p style="font-size:18pt;text-align:right">PURCHASE ORDER</p></th>
                </tr>

            </table>
            <table cellpadding="0">
                <tr>
                    <th width="40%">
                    <p>Purchase From :
                        <br/>
                        <br/>
                        <strong>' . $datapo['ifp']->name_supplier . '</strong>
                        <br />
                        Jl. Jababeka XI Kawasan Industri Jababeka No.12, Harja Mekar, Kec. Cikarang Utara, Kabupaten Bekasi, Jawa Barat 17530
                        <br />
                        Telp. (021) 89830143
                    </p>
                    </th>
                    <th width="20%"></th>
                    <th width="40%">
                    <p>Ship To :
                        <br/>
                        <br/>
                        <strong>Deby Eko Hidayat</strong>
                        <br />
                        Jl. Beruang IX No.86, Jayamukti, Kec. Cikarang Pusat
                        <br />
                        Telp. 0857 1638 7955
                    </p>
                    </th>
                </tr>

            </table>
            <p></p>
            <table id="tb-item" cellpadding="4">
                <tr style="background-color:#a9a9a9">
                    <th width="35%" style="height: 20px"><strong>Nama Barang</strong></th>
                    <th width="8%" style="height: 20px;text-align:center"><strong>Qty</strong></th>
                    <th width="12%" style="height: 20px"><strong>Satuan</strong></th>
                    <th width="15%" style="height: 20px"><strong>Harga</strong></th>
                    <th width="15%" style="height: 20px"><strong>Diskon</strong></th>
                    <th width="15%" style="height: 20px"><strong>Total</strong></th>
                </tr>
                ' . implode($row) . '
                <tr style="border:1px solid #000">
                    <td colspan="5" style="height: 20px"><strong>Grand Total</strong></td>
                    <td style="height: 20px;text-align:right"><strong>' . number_format(array_sum($arraytotal), 0, ',', '.') . '</strong></td>
                </tr>
            </table>
            <br/>
            <table cellpadding="4">
                <tr>
                    <td width="50%" style="height: 20px;text-align:center">
                        <p>&nbsp;</p>
                    </td>
                    <td width="50%" style="height: 20px;text-align:center">
                        <p>Hormat kami,<br />QEARAF.COM</p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p><u>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</u></p>
                    </td>
                </tr>
            </table>

            <style>
                p,
                span,
                table {
                    font-size: 12px
                }

                table {
                    width: 100%;
                    border: 1px solid #dee2e6;
                }

                table#tb-item tr th,
                table#tb-item tr td {
                    border: 1px solid #000
                }
            </style>
            ';

        return $data;
    }



    // public function cetak($link = null)
    // {

    //     // dd($link);

    //     // create new PDF document
    //     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    //     // set document information
    //     $pdf->SetCreator(PDF_CREATOR);
    //     $pdf->SetAuthor('admin.qearaf.com');
    //     $pdf->SetTitle('PDF Sobatcoding.com');
    //     $pdf->SetSubject('TCPDF Tutorial');
    //     $pdf->SetKeywords('TCPDF, PDF, example, sobatcoding.com');

    //     // set default header data
    //     $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
    //     $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

    //     // set header and footer fonts
    //     $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    //     $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    //     // set default monospaced font
    //     $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //     // set margins
    //     $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    //     $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    //     $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //     // set auto page breaks
    //     $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //     // set image scale factor
    //     $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //     if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    //         require_once(dirname(__FILE__) . '/lang/eng.php');
    //         $pdf->setLanguageArray($l);
    //     }

    //     // set default font subsetting mode
    //     $pdf->setFontSubsetting(true);

    //     // Set font
    //     // dejavusans is a UTF-8 Unicode font, if you only need to
    //     // print standard ASCII chars, you can use core fonts like
    //     // helvetica or times to reduce file size.
    //     $pdf->SetFont('dejavusans', '', 14, '', true);

    //     // Add a page
    //     // This method has several options, check the source code documentation for more information.
    //     $pdf->AddPage();

    //     // QRCODE,H : QR-CODE Best error correction

    //     $pdf->write2DBarcode('https://qearaf.com/detail/purchaseview/230907P020D8E6EEF', 'QRCODE,H', 0, 3, 20, 20, ['position' => 'R'], 'N');
    //     $style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
    //     $pdf->Line(15, 25, 195, 25, $style);
    //     $pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
    //     //view mengarah ke invoice.php

    //     $html = view('pages_admin/pdf_form_purchase_order');

    //     // Print text using writeHTMLCell()
    //     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    //     // ---------------------------------------------------------
    //     $this->response->setContentType('application/pdf');
    //     // Close and output PDF document
    //     // This method has several options, check the source code documentation for more information.
    //     $pdf->Output('invoice-pos-sobatcoding.pdf', 'I');
    // }
}
