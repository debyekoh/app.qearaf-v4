<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['auth', 'array', 'form'];
    protected $shopModel;
    protected $ballanceAccount;
    protected $ballanceAccountLog;
    protected $ballanceEWallet;
    protected $ballanceEWalletLog;
    protected $debtAccount;
    protected $debtAccountLog;
    protected $ListMarketplaceModel;
    protected $ListDeliveryServicesModel;
    protected $listNotificationModel;
    protected $tabshop;
    protected $session;

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->session = \Config\Services::session();
        $this->ballanceAccount = new \App\Models\BallanceAccount();
        $this->ballanceAccountLog = new \App\Models\BallanceAccountLog();
        $this->ballanceEWallet = new \App\Models\BallanceEWallet();
        $this->ballanceEWalletLog = new \App\Models\BallanceEWalletLog();
        $this->debtAccount = new \App\Models\DebtAccount();
        $this->debtAccountLog = new \App\Models\DebtAccountLog();
        $this->shopModel = new \App\Models\ShopModel();
        $this->ListMarketplaceModel = new \App\Models\ListMarketplaceModel();
        $this->ListDeliveryServicesModel = new \App\Models\ListDeliveryServicesModel();
        $this->listNotificationModel = new \App\Models\ListNotificationModel();
        isset(user()->member_id) ? $this->tabshop = $this->shopModel->asArray()->where('member_id', user()->member_id)->where('active', 1)->orderBy('marketplace', 'asc')->findAll() : '';
        // $this->tabshop = $this->shopModel->asArray()->where('member_id', user()->member_id)->where('active', 1)->orderBy('marketplace', 'asc')->findAll();
    }
}
