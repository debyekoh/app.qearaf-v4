<?php

namespace App\Libraries;

use TCPDF;

class MY_TCPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        // $image_file = ROOTPATH . 'public/logo-bg.png';
        $image_file = ROOTPATH . 'public/assets/images/Logo Master 3.png';
        /**
         * width : 50
         */
        // Set font
        // Title
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        $this->Image($image_file, '', '', 80, '', '', 'https://admin.qearaf.com');
        $this->SetFont('helvetica', '', 10);
        $this->setY(16);
        $this->Cell(0, 2, 'Jl. Beruang IX , No 86 , Cikarang Pusat', 0, 1, '', 0, '', 0);
        $this->setY(20);
        $this->Cell(0, 2, 'Telp. 0857 1638 7955', 0, 1, '', 0, '', 0);
        // $this->setY(21);
        // $this->Cell(0, 2, 'https://qearaf.com/', 0, 1, '', 0, '', 0);
        // // Title
        // $this->SetFont('helvetica', '', 9);
        // $this->SetX(70);
        // $this->Cell(0, 2, 'Gg. Permadi No 55 Polehan Malang', 0, 1, '', 0, '', 0);
        // $this->SetX(70);
        // $this->Cell(0, 2, 'Telp. 0813 3198 9882', 0, 1, '', 0, '', 0);
        // $this->SetX(70);
        // $this->Cell(0, 2, 'https://sobatcoding.com', 0, 1, '', 0, '', 0);

        // QRCODE,H : QR-CODE Best error correction
        // $this->write2DBarcode('https://qearaf.com/detail/purchaseview/230907P020D8E6EEF', 'QRCODE,H', 0, 3, 20, 20, ['position' => 'R'], 'N');

        // $style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $this->Line(15, 25, 195, 25, $style);
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
