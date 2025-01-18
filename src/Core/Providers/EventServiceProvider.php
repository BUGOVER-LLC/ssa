<?php

declare(strict_types=1);

namespace Core\Providers;

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
            \Infrastructure\Listener\FetchMigrationsStarted::class
        ],
        \Illuminate\Database\Events\MigrationsEnded::class => [
            \Infrastructure\Listener\FetchMigrationsEnded::class
        ],
    ];
}
