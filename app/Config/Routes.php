<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/', 'Home::index');
$routes->get('/', 'AdminControlpage\Dashboards\Dashboards::index');

/* --------------------------------------------------------------------
 * Route AdminControlpage
 */
// Dashboards
$routes->get('/dashboards', 'AdminControlpage\Dashboards\Dashboards::index');

// Shop
$routes->get('/myshop', 'AdminControlpage\Shop\Myshop\Myshop::index');
$routes->get('/myshops/(:any)', 'AdminControlpage\Shop\Myshop\Myshop::shops/$1');
$routes->post('/setting_account/addshop/(:any)', 'AdminControlpage\Users\UsersAccountSetting::addshop/$1');
$routes->post('/setting_account/csp', 'AdminControlpage\Users\UsersAccountSetting::changeshopstatus'); //AjaxModal
$routes->match(['get', 'post'], '/setting_account/eds', 'AdminControlpage\Users\UsersAccountSetting::editshop'); //AjaxModal
$routes->post('/setting_account/uds', 'AdminControlpage\Users\UsersAccountSetting::updateshop');
$routes->match(['get', 'post'], '/setting_account/dds', 'AdminControlpage\Users\UsersAccountSetting::deleteshop'); //AjaxModal

// Products
$routes->get('/myproducts', 'AdminControlpage\Products\Products::index');
$routes->get('/myproducts/show', 'AdminControlpage\Products\Products::show');
$routes->get('/createproduct', 'AdminControlpage\Products\Products::create', ['filter' => 'role:SuAdmin']);
$routes->get('/product/(:any)', 'AdminControlpage\Products\Products::detail/$1');
$routes->post('/saveproduct', 'AdminControlpage\Products\Products::save', ['filter' => 'role:SuAdmin']);
$routes->get('/editproduct/(:any)', 'AdminControlpage\Products\Products::edit/$1', ['filter' => 'role:SuAdmin']);
$routes->post('/updateproduct/(:any)', 'AdminControlpage\Products\Products::update/$1', ['filter' => 'role:SuAdmin']);
$routes->get('/duplicateproduct/(:any)', 'AdminControlpage\Products\Products::copy/$1', ['filter' => 'role:SuAdmin']);
$routes->post('/copyproduct/(:any)', 'AdminControlpage\Products\Products::savecopy/$1', ['filter' => 'role:SuAdmin']);
$routes->match(['get', 'post'], '/deleteproduct', 'AdminControlpage\Products\Products::delete', ['filter' => 'role:SuAdmin']);

// Ecommerce
$routes->get('/sales', 'AdminControlpage\Ecommerce\Sales\Sales::index');
$routes->get('/addnewsales', 'AdminControlpage\Ecommerce\Sales\Sales::create', ['filter' => 'permission:Create']);
$routes->get('/purchase', 'AdminControlpage\Ecommerce\Purchase\Purchase::index');
$routes->get('/addnewpurchase', 'AdminControlpage\Ecommerce\Purchase\Purchase::create', ['filter' => 'permission:Create']);
$routes->get('/invoice', 'AdminControlpage\Ecommerce\Invoice\Invoice::index');

//Delivery
$routes->get('/delivery', 'AdminControlpage\Delivery\Delivery::index');

//Warehouse
$routes->get('/stock', 'AdminControlpage\Warehouse\Stock::index');
$routes->get('/historyinout', 'AdminControlpage\Warehouse\HistoryInOut::index');

//Finance
$routes->get('/summaryfinance', 'AdminControlpage\Finance\SummaryFinance::index');
$routes->get('/balance', 'AdminControlpage\Finance\Balance::index');
$routes->get('/ewallet', 'AdminControlpage\Finance\Ewallet::index');
$routes->get('/incomeprofit', 'AdminControlpage\Finance\IncomeProfit::index');
$routes->get('/debt', 'AdminControlpage\Finance\Debt::index');
$routes->get('/inventoryvalue', 'AdminControlpage\Finance\InventoryValue::index');

//Users
$routes->get('/userslist', 'AdminControlpage\Users\UsersList::index', ['filter' => 'role:SuAdmin']);
$routes->get('/userview/(:any)', 'AdminControlpage\Users\UsersList::detail/$1', ['filter' => 'role:SuAdmin']);
$routes->get('/setting_account', 'AdminControlpage\Users\UsersAccountSetting::index');
$routes->get('/setting_account/change', 'AdminControlpage\Users\UsersAccountSetting::edit');
$routes->post('/setting_account/update/(:any)/(:any)', 'AdminControlpage\Users\UsersAccountSetting::update/$1/$2');


/*
 * --------------------------------------------------------------------
 */


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
