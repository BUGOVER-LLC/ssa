<?php

declare(strict_types=1);

/** @var Laravel\Lumen\Routing\Router $router */

$router = $this->app['router'];

// Auth
$router->group(['namespace' => '\Modules\Users\Controllers', 'middleware' => 'guest', 'prefix' => 'auth'], fn() => [
    $router->post('login', 'LoginController'),
    $router->post('register', 'RegisterController'),
]);

// Users
$router->group(['middleware' => 'auth'], fn() => [
    $router->get('users', 'UserController@getAll'),
    $router->get('users/{id:[0-9]+}', 'UserController@get'),
    $router->post('users', 'UserController@create'),
    $router->put('users', 'UserController@update'),
    $router->delete('users', 'UserController@delete'),
]);
