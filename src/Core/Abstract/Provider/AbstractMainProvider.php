<?php

declare(strict_types=1);

namespace App\Abstract\Provider;

use Illuminate\Support\ServiceProvider;

abstract class AbstractMainProvider extends ServiceProvider
{
    public static string $domainTag = 'sample.domain';

    public static string $domainName = 'SampleDomain';

    public static string $domainVersion = '0.0.1';

    public static string $domainPath = '/';

    protected array $serviceProviders = [];

    protected array $aliases = [];
}
