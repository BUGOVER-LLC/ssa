<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First we need to get an application instance. This creates an instance
| of the application / container and bootstraps the application so it
| is ready to receive HTTP / Console requests from the environment.
|
*/
/* @var Laravel\Lumen\Application $app */
$app = require __DIR__ . '/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response src to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/
$app->run();
