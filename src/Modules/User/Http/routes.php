<?php

declare(strict_types=1);

use Module\User\Http\Controllers\LoginController;
use Module\User\Http\Controllers\LogoutController;
use Module\User\Http\Controllers\RegisterController;

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
        $router->post('register', RegisterController::class),
    ]
);

// Users
$router->group(
    ['middleware' => ['auth'], 'prefix' => 'started'],
    fn() => [
        $router->post('current-logout', [LogoutController::class, 'logoutCurrent']),
        $router->post('other-logout', [LogoutController::class, 'logoutOther']),
        $router->post('all-logout', [LogoutController::class, 'logoutAll']),
    ]
);
