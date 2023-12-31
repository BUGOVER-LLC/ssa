<?php

declare(strict_types=1);

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Illuminate\Database\Events\MigrationsStarted::class => [
            \App\Listener\FetchMigrationsStarted::class
        ],
        \Illuminate\Database\Events\MigrationsEnded::class => [
            \App\Listener\FetchMigrationsEnded::class
        ],
    ];
}
