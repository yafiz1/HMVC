<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/Perpustakaan', '\App\Modules\Perpustakaan\Controllers\Perpustakaan::index');
$routes->add('/Perpustakaan/(:any)', '\App\Modules\Perpustakaan\Controllers\Perpustakaan::$1');
$routes->addRedirect('/Perpustakaan/anggota', '/Perpustakaan/anggota');
$routes->addRedirect('/Perpustakaan/buku', '/Perpustakaan/buku');
$routes->addRedirect('/Perpustakaan/petugas', '/Perpustakaan/petugas');
$routes->addRedirect('/Perpustakaan/peminjaman', '/Perpustakaan/peminjaman');

$routes->get('/Login', '\App\Modules\Login\Controllers\Login::index');
$routes->add('/Login/(:any)', '\App\Modules\Login\Controllers\Login::$1');
$routes->addRedirect('/Login/registerView', '/Login/registerView');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
