<?php

require 'vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Chat;

/*
$app = new \Ratchet\App('localhost', 8080);
$app->route('/chat', new \App\Chat);
//$app->route('/echo', new Ratchet\Server\EchoServer, array('*'));
$app->run();
*/

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    8080
);

$server->run();