<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Default Route (Redirects to Login via Home Controller)
$routes->get('/', 'Home::index');

// 2. Authentication Routes
$routes->group('auth', function($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('attemptLogin', 'Auth::attemptLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('store', 'Auth::store');
    $routes->get('logout', 'Auth::logout');
});

// 3. Customer Routes
// Dashboard
$routes->get('/dashboard', 'Dashboard::index');

// Ring Catalog (Publicly Viewable)
$routes->group('rings', function($routes) {
    $routes->get('/', 'Rings::index');
    $routes->get('show/(:num)', 'Rings::show/$1');
});

$routes->group('profile', function($routes) {
    $routes->get('/', 'Profile::index');
    $routes->post('update', 'Profile::update');
});
// Reservations (Booking Flow)
$routes->group('reservations', function($routes) {
    $routes->post('create', 'Reservations::create');
    $routes->get('checkout/(:num)', 'Reservations::checkout/$1');
    $routes->post('processPayment', 'Reservations::processPayment');
    $routes->get('history', 'Reservations::history');
    $routes->get('receipt/(:num)', 'Reservations::receipt/$1');
});

// 4. Admin Routes
// We group these under the 'Admin' namespace
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    
    // Admin Dashboard
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('print-dashboard', 'Dashboard::printReport');

    // Ring Inventory Management
    $routes->group('rings', function($routes) {
        $routes->get('/', 'Rings::index');           // List
        $routes->get('create', 'Rings::create');     // Show Create Form
        $routes->post('store', 'Rings::store');      // Save New
        $routes->get('edit/(:num)', 'Rings::edit/$1'); // Show Edit Form
        $routes->post('update/(:num)', 'Rings::update/$1'); // Save Updates
        $routes->get('delete/(:num)', 'Rings::delete/$1');  // Delete
    });

    // Reservation Management
    $routes->group('reservations', function($routes) {
        $routes->get('/', 'Reservations::index');
        $routes->post('updateStatus', 'Reservations::updateStatus');
    });

    // Profile Management
$routes->get('profile', 'Profile::index');
$routes->post('profile/update', 'Profile::update');

    $routes->get('customers', 'Customers::index'); 
    
    // Reports
    $routes->get('reports', 'Reports::index');
    $routes->get('reports/print', 'Reports::printReport');
});