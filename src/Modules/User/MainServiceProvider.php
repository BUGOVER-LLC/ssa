<?php

declare(strict_types=1);

namespace Module\User;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Route::group([
            'prefix' => env('APP_VERSION'),
        ], fn() => $this->loadRoutesFrom(__DIR__ . '/../routes.php'));
    }
}
