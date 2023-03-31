<?php

namespace Config;

use DeepCopy\Filter\Filter;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->get('blog', 'Home::blog');

$routes->get('/', 'Home::index');
$routes->post('signup', 'Home::form_signup');
$routes->post('search', 'Home::search');
$routes->post('login', 'Home::form_login');
$routes->get('login', 'Home::login');
$routes->get('recommendeds', 'Home::display_recommendeds');
$routes->get('index_see_more', 'Home::index_see_more');

$routes->get('format', 'Home::format');

$routes->get('post/(:any)', 'Post::display_current_post/$1', ['as' => 'post']);
$routes->get('upload', 'Upload::index');

$routes->get('upload_recommended', 'Upload::index_recommended');
$routes->post('upload/recommended', 'Upload::upload_recommended');

$routes->group('', ['filter' => 'routeFilter', 'namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('signup', 'Home::signUp');
    $routes->post('upload/upload', 'Upload::upload');
    $routes->get('upload/save_to_drafts', 'Upload::save_to_drafts');

    $routes->get('panel_control', 'UserPanel::load_panel');
    $routes->get('cerrar_sesion', 'UserPanel::cerrar_sesion');
    $routes->get('delete/(:any)', 'UserPanel::borrar_post/$1');
    $routes->get('edit/(:any)', 'UserPanel::open_edit_window/$1');
    $routes->post('edit/(:any)', 'UserPanel::editar_post/$1');
});

$routes->get('category/(:any)', 'Categories::display_category/$1');

$routes->get('downloads', 'About_us::return_dowloads');
$routes->get('revista/(:any)', 'About_us::download_window/$1');
$routes->get('contact', 'About_us::return_contact');
$routes->post('msg_contact', 'About_us::msg_contact');
$routes->get('about_us', 'About_us::about_us');
$routes->get('about_author/(:any)', 'About_us::about_author/$1');



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
