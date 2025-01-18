<?php

declare(strict_types=1);

namespace Core\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Http\Request\ApiRequest;

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
        $this->strictModeAdoption();

        $this->app->resolving(ApiRequest::class, function ($form, $app) {
            $form = ApiRequest::createFrom($app['request'], $form);
            $form->setContainer($app);
        });

        $this->app->afterResolving(ApiRequest::class, function (ApiRequest $form) {
            $form->validate();
        });
    }

    /**
     * Is determinate strict mode level for eloquent
     *
     * @return void
     */
    protected function strictModeAdoption(): void
    {
        $strict = (bool) config('app.strict');
        $level = (int) config('app.strict_level');

        if ($strict) {
            if (1 === $level) {
                Model::shouldBeStrict();
            } elseif (2 === $level) {
                Model::preventLazyLoading();
                Model::preventAccessingMissingAttributes();
                Model::preventSilentlyDiscardingAttributes(false);
            } elseif (3 === $level) {
                Model::preventSilentlyDiscardingAttributes(false);
            }
        }
    }
}
