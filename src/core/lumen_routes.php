<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Socket.io Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/** @var Laravel\Lumen\Routing\Router $router */
$router = $this->app['router'];

$router->get('socket.io', ['uses' => 'SocketIOController@upgrade']);
$router->post('socket.io', ['uses' => 'SocketIOController@reject']);
