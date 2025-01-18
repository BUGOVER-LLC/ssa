<?php

declare(strict_types=1);

namespace Core\Loader;

use Illuminate\Support\Facades\App;

trait LoadProviders
{
    /**
     * Load the all the registered Service Providers on the Main Service Provider.
     */
    public function loadServiceProviders(): void
    {
        foreach ($this->serviceProviders ?? [] as $provider) {
            if (class_exists($provider)) {
                $this->loadProvider($provider);
            }
        }
    }

    /**
     * @param $providerFullName
     * @return void
     */
    private function loadProvider($providerFullName): void
    {
        App::register($providerFullName);
    }
}
