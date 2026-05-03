<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ===== HALAMAN GUEST (Tidak Perlu Login) =====
$routes->get('login', 'AuthController::index');
$routes->post('loginProcess', 'AuthController::loginProcess');

// ===== HALAMAN ADMIN (Perlu Login - Protected) =====
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('home', 'Home::index');
    $routes->get('profil', 'Profil::index');
    $routes->get('prodi', 'Prodi::index');
    $routes->get('logout', 'AuthController::logout');
});