<?php

declare(strict_types=1);

return [
    // System Providers
    Illuminate\Redis\RedisServiceProvider::class,
    Laravel\Socialite\SocialiteServiceProvider::class,
    Tymon\JWTAuth\Providers\LumenServiceProvider::class,
    SwaggerLume\ServiceProvider::class,
    Hhxsv5\LaravelS\Illuminate\LaravelSServiceProvider::class,
    LaravelDoctrine\ORM\DoctrineServiceProvider::class,

    // App Providers
    Core\Providers\AppServiceProvider::class,
    Core\Providers\AuthServiceProvider::class,
    Core\Providers\EventServiceProvider::class,
    Core\Providers\ModuleServiceProvider::class,
];
