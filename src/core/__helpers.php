<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Log;

if (!function_exists('logging')) {
    /**
     * @param Exception $exception
     * @param string $channel "daily", "error".
     * @return void
     */
    function logging(Exception $exception, string $channel = 'daily'): void
    {
        Log::channel($channel)->warning(
            $exception->getMessage(),
            ['file' => $exception->getFile(), 'line' => $exception->getLine(), 'code' => $exception->getCode()]
        );
    }
}

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param string $path
     * @return string
     */
    function config_path(string $path = ''): string
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}
