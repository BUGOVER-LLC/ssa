<?php

declare(strict_types=1);

use Module\User\Http\Controllers\LoginController;
use Module\User\Http\Controllers\LogoutBaseController;
use Module\User\Http\Controllers\RegisterBaseController;

/**
 * --------------
 * Define route
 *
 * @var Laravel\Lumen\Routing\Router $router
 */
$router = $this->app['router'];

// Auth
$router->group(
    ['prefix' => 'auth'],
    fn() => [
        $router->post('login', LoginController::class),
        $router->post('register', RegisterBaseController::class),
    ]
);

// Users
$router->group(
    ['middleware' => ['auth'], 'prefix' => 'logout'],
    fn() => [
        $router->post('current', [LogoutBaseController::class, 'logoutCurrent']),
        $router->post('other', [LogoutBaseController::class, 'logoutOther']),
        $router->post('all', [LogoutBaseController::class, 'logoutAll']),
    ]
);
