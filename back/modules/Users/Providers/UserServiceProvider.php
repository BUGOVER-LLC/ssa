<?php

declare(strict_types=1);

namespace Modules\Users\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
            'prefix' => 'v1',
            'namespace' => 'Modules\Users\Controllers',
            'middleware' => null,
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        });
    }
}
