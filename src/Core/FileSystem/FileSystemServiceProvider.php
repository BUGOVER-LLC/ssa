<?php

declare(strict_types=1);

namespace Core\FileSystem;

use Core\FileSystem\Contracts\FileSystemContract;
use Illuminate\Support\ServiceProvider;

/**
 * FileSystem service provider.
 */
final class FileSystemServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        parent::register();

        $this->app->bind(FileSystemContract::class, FileSystem::class);
    }
}
