<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\ApiRequest;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->app->resolving(ApiRequest::class, function ($form, $app) {
            $form = ApiRequest::createFrom($app['request'], $form);
            $form->setContainer($app);
        });

        $this->app->afterResolving(ApiRequest::class, function (ApiRequest $form) {
            $form->validate();
        });
    }
}
