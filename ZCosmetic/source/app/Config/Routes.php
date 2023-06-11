<?php

namespace Config;

use App\Controllers\Home;

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// HOME 
$routes->get('/', 'Home::index');

$routes->get('/Home/About', 'Home::about');
$routes->get('/Home/Blog', 'Home::blog');

$routes->get('/Home/ProductRightSidebar', 'Home::product_right_sidebar');
$routes->get('/Home/Product', 'Home::product_details');
$routes->get('Home/Products', 'Home::products');

// Pages
$routes->match(['get', 'post'],'/Pages/AccountLogin', 'Pages::account_login'); // Lỗi nè khóc

$routes->get('/Pages/Faq', 'Pages::faq');
$routes->get('/Pages/Category', 'Pages::category');
$routes->match(['get', 'post'],'/Pages/Contact', 'Pages::contact');
$routes->get('/Pages/Logout', 'Pages::logout');
$routes->get('/Pages/ProductDetails', 'Pages::product_details');
$routes->get('/Pages/Orders', 'Pages::orders');
$routes->post('/Pages/Search', 'Pages::search');


//Admin
$routes->get('CP/', 'CP::index');
$routes->match(['get', 'post'], 'CP/Account/(:num)', 'CP::account/$1');
$routes->get('CP/CreateAccount', 'CP::createAccount');
$routes->get('CP/Products', 'CP::products');
$routes->get('CP/CheckOrder', 'CP::check_order');
$routes->get('CP/GetProducts', 'CP::getSP_Pagination');
$routes->get('CP/CreateImportTicket', 'CP::createImportTicket');

// Chat
$routes->get('/Chat/Users', 'Chat::chat_users');
$routes->get('/Chat/PhpUsers', 'Chat::chat_php_users');
$routes->post('/Chat/PhpSearch', 'Chat::chat_php_search');
$routes->get('/Chat/ChatUser', 'Chat::chat_id');

$routes->post('/Chat/PhpGetChat', 'Chat::chat_php_get_chat');
$routes->post('/Chat/PhpInsertChat', 'Chat::chat_php_insert_chat');
//Áp dụng đường dẫn dưới dạng: /<Controller>/<Action>/<Params...>
$routes->get('/Pages/Cart', 'Pages::cart');
$routes->get('/Pages/Checkout', 'Pages::checkout');
$routes->get('/Pages/Login', 'Pages::login');

$routes->post('/Ajax/AddCart', 'Ajax::addCart');
$routes->post('/Ajax/RemoveCart', 'Ajax::removeCart');
$routes->post('/Ajax/UpdateCart', 'Ajax::updateCart');
$routes->post('/Ajax/GetTotalCart', 'Ajax::getTotalCart');
$routes->post('/Ajax/CheckoutCarts', 'Ajax::checkoutCarts');
$routes->post('/Ajax/BuyNow', 'Ajax::buyNow');
$routes->post('/Ajax/GetProduct', 'Ajax::getProduct');
$routes->post('/Ajax/Pay', 'Ajax::pay');
$routes->post('/Ajax/SaveAccount', 'Ajax::saveAccount');
$routes->post('/Ajax/DeleteAccount/(:num)', 'Ajax::deleteAccount/$1');
$routes->post('/Ajax/AcceptOrder', 'Ajax::acceptOrder');
$routes->post('/Ajax/CancelOrder', 'Ajax::cancelOrder');
$routes->get('/Pages/AccountRegister', 'Ajax::account_register');
$routes->post('/Ajax/addAccountRegister', 'Ajax::addAccountRegister');

$routes->get('/Pages/MyAccount', 'Ajax::my_account');
$routes->post('/Ajax/updateAccount', 'Ajax::updateAccount');

$routes->post('/Ajax/updatePassword', 'Ajax::updatePassword');

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
