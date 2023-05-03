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
<<<<<<< HEAD
$routes->get('/home/about', 'Home::about');
$routes->get('/home/blog', 'Home::blog');

// pages 
$routes->get('/pages/account_login', 'Pages::account_login');
$routes->get('/pages/faq', 'Pages::faq');
$routes->get('/pages/cart', 'Pages::cart');
$routes->get('/pages/category', 'Pages::category');
$routes->get('/pages/contact', 'Pages::contact');
$routes->get('/pages/my_account', 'Pages::my_account');
$routes->get('/pages/product_checkout', 'Pages::product_checkout');
$routes->get('/pages/product_details', 'Pages::product_details');

=======
//Áp dụng đường dẫn dưới dạng: /<Controller>/<Action>/<Params...>
$routes->get('/home/about', 'Home::about');
>>>>>>> e549af32a98c553f1f7c7a284a05de567068fb6f
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
