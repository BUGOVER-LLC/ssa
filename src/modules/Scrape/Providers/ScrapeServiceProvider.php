<?php

declare(strict_types=1);

namespace Modules\Scrape\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Scrape\Console\ScrapCommand;

class ScrapeServiceProvider extends ServiceProvider
{
    private array $commands = [
        ScrapCommand::class
    ];

    public function register()
    {
    }

    public function boot()
    {
        $this->commands($this->commands);
    }
}
