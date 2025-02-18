<?php

declare(strict_types=1);

namespace Infrastructure\WebSocket;

use Hhxsv5\LaravelS\Swoole\WebSocketHandlerInterface;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

class WebsocketHandler implements WebSocketHandlerInterface
{
// Declare constructor without parameters
    public function __construct()
    {
    }

    // public function onHandShake(Request $request, Response $response)
    // {
    // Custom handshake: https://www.swoole.co.uk/docs/modules/swoole-websocket-server-on-handshake
    // The onOpen event will be triggered automatically after a successful handshake
    // }

    public function onOpen(Server $server, Request $request)
    {
        // Before the onOpen event is triggered, the HTTP request to establish the WebSocket has passed the Laravel route,
        // so Laravel's Request, Auth information are readable, Session is readable and writable, but only in the onOpen event.
        // \Log::info('New WebSocket connection', [$request->fd, request()->all(), session()->getId(), session('xxx'), session(['yyy' => time()])]);
        // The exceptions thrown here will be caught by the upper layer and recorded in the Swoole log. Developers need to try/catch manually.
        $server->push($request->fd, 'Welcome to LaravelS');
    }

    public function onMessage(Server $server, Frame $frame)
    {
        // \Log::info('Received message', [$frame->fd, $frame->data, $frame->opcode, $frame->finish]);
        // The exceptions thrown here will be caught by the upper layer and recorded in the Swoole log. Developers need to try/catch manually.
        $server->push($frame->fd, date('Y-m-d H:i:s'));
    }

    public function onClose(Server $server, $fd, $reactorId)
    {
        // The exceptions thrown here will be caught by the upper layer and recorded in the Swoole log. Developers need to try/catch manually.
    }
}
