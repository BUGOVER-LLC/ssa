<?php

declare(strict_types=1);

use Modules\Users\Controllers\LoginController;
use Modules\Users\Controllers\RegisterController;

/** @var Laravel\Lumen\Routing\Router $router */
$router = $this->app['router'];

// Auth
$router->group(['middleware' => 'guest', 'prefix' => 'auth'], fn() => [
    $router->post('login', LoginController::class),
    $router->post('register', RegisterController::class),
]);

// Users
$router->group(['middleware' => 'auth', 'prefix' => 'started'], fn() => [
    $router->get('users', 'UserController@getAll'),
    $router->get('users/{id:[0-9]+}', 'UserController@get'),
    $router->post('users', 'UserController@create'),
    $router->put('users', 'UserController@update'),
    $router->delete('users', 'UserController@delete'),
]);
