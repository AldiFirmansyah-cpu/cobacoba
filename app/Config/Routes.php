<?php
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('login', 'AuthController::index');
$routes->post('loginProcess', 'AuthController::loginProcess');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('home', 'Home::index');

    $routes->get('keranjang', 'CartController::index');
    $routes->post('keranjang/add', 'CartController::add');
    $routes->post('keranjang/update', 'CartController::update');
    $routes->get('keranjang/remove/(:num)', 'CartController::remove/$1');
    $routes->get('keranjang/clear', 'CartController::clear');

    $routes->get('transaksi', 'TransactionController::index');
    $routes->post('transaksi/checkout', 'TransactionController::checkout');
    $routes->get('transaksi/detail/(:num)', 'TransactionController::detail/$1');
    $routes->get('transaksi/status/(:num)/(:segment)', 'TransactionController::updateStatus/$1/$2');
    $routes->get('transaksi/delete/(:num)', 'TransactionController::delete/$1');
    $routes->get('transaksi/cetak/(:num)', 'TransactionController::cetak/$1');

    $routes->get('layanan', 'LaundryController::index');
    $routes->get('layanan/create', 'LaundryController::create');
    $routes->post('layanan/store', 'LaundryController::store');
    $routes->get('layanan/edit/(:num)', 'LaundryController::edit/$1');
    $routes->post('layanan/update/(:num)', 'LaundryController::update/$1');
    $routes->get('layanan/delete/(:num)', 'LaundryController::delete/$1');

    $routes->get('pelanggan', 'CustomerController::index');
    $routes->get('pelanggan/create', 'CustomerController::create');
    $routes->post('pelanggan/store', 'CustomerController::store');
    $routes->get('pelanggan/edit/(:num)', 'CustomerController::edit/$1');
    $routes->post('pelanggan/update/(:num)', 'CustomerController::update/$1');
    $routes->get('pelanggan/delete/(:num)', 'CustomerController::delete/$1');

    $routes->get('laporan', 'ReportController::index');
    $routes->get('laporan/pdf', 'ReportController::generatePDF');

    $routes->get('profil', 'ProfilController::index');
    $routes->get('logout', 'AuthController::logout');
});