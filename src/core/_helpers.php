<?php

declare(strict_types=1);

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
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
        return app()->basePath() . DIRECTORY_SEPARATOR . 'config' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('jsponse')) {
    /**
     * @param array $data
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    function jsponse($data = [], int $status = 200, array $headers = [], int $options = 0): JsonResponse
    {
        return app(ResponseFactory::class)->json($data, $status, $headers, $options);
    }
}
