<?php

declare(strict_types=1);


use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function (\SwooleTW\Http\Websocket\Websocket $websocket, Request $request) {
    // called while socket on connect
});

Websocket::on('disconnect', function (\SwooleTW\Http\Websocket\Websocket $websocket) {
    // called while socket on disconnect
});

Websocket::on('example', function (\SwooleTW\Http\Websocket\Websocket $websocket, $data) {
    $websocket->emit('message', $data);
});
