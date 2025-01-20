<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/
$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);
$app->withFacades();

/*
|--------------------------------------------------------------------------
| Register Config Files
|--------------------------------------------------------------------------
|
| Now we will register the "core" configuration file. If the file exists in
| your configuration directory it will be loaded; otherwise, we'll load
| the default version. You may register other files below as needed.
|
*/
foreach (glob(dirname(__DIR__) . '/config/*.php') as $config) {
    $app->configure(strstr(basename($config), '.', true));
}

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Core\Kernel\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Core\Kernel\Cli::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/
$app->middleware([
    Infrastructure\Http\Middleware\Cors::class,
]);

$app->routeMiddleware([
    'auth' => Infrastructure\Http\Middleware\Authenticate::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/
if ($app->isLocal()) {
    $app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
}
// System Providers
$app->register(Illuminate\Redis\RedisServiceProvider::class);
$app->register(Laravel\Socialite\SocialiteServiceProvider::class);
$app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);
$app->register(SwaggerLume\ServiceProvider::class);
$app->register(Hhxsv5\LaravelS\Illuminate\LaravelSServiceProvider::class);
$app->register(LaravelDoctrine\ORM\DoctrineServiceProvider::class);
// App Providers
$app->register(Core\Providers\AppServiceProvider::class);
$app->register(Core\Providers\AuthServiceProvider::class);
$app->register(Core\Providers\EventServiceProvider::class);
$app->register(Core\Providers\ModuleServiceProvider::class);

// Run app!
return $app;
