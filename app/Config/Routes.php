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
$routes->get('/', 'CompanyController::index',['as' => 'index']);
$routes->get('/log-in', 'SecurityController::login',['as' => 'login']);
$routes->post('/log-in', 'SecurityController::authentication',['as' => 'login']);
$routes->get('/sign-in', 'SecurityController::signIn',['as' => 'signIn']);
$routes->post('/sign-in', 'SecurityController::addMember',['as' => 'signIn']);
$routes->get('/log-out', 'SecurityController::logOut',['as' => 'logOut']);
$routes->get('/admin', 'CompanyController::admin',['as' => 'admin']);
$routes->get('/admin/edit', 'CompanyController::adminEdit',['as' => 'adminEdit']);
$routes->get('/admin/add', 'CompanyController::adminAdd',['as' => 'adminAdd']);
$routes->get('/admin/remove', 'CompanyController::adminRemove',['as' => 'adminRemove']);
$routes->get('/internship', 'CompanyController::internship',['as' => 'internship']);
$routes->get('/companies', 'CompanyController::companies',['as' => 'companies']);
$routes->get('/legal-notices', 'MainController::legalNotices',['as' => 'legalNotices']);
$routes->get('/site-map', 'MainController::siteMap',['as' => 'siteMap']);


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
