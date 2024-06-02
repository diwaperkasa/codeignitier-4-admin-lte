<?php

use CodeIgniter\Router\RouteCollection;
use Config\App;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [\App\Controllers\Admin\FinanceController::class, 'index']);

$routes->group('api', static function ($routes) {
    $routes->group('finance', static function ($routes) {
        $routes->get('/', [\App\Controllers\Api\FinanceApiController::class, 'list']);
        $routes->post('/', [\App\Controllers\Api\FinanceApiController::class, 'create']);
        $routes->post('(:num)', [\App\Controllers\Api\FinanceApiController::class, 'update']);
        $routes->delete('(:num)', [\App\Controllers\Api\FinanceApiController::class, 'delete']);
    });
});