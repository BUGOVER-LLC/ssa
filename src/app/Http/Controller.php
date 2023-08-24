<?php

declare(strict_types=1);

namespace App\Http;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;
use JsonSerializable;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Create a json response.
     *
     * @param mixed $data
     * @param int $statusCode
     * @param array $headers
     *
     * @return JsonResponse
     */
    protected function response($data, $statusCode = 200, array $headers = []): JsonResponse
    {
        if ($data instanceof Arrayable && !$data instanceof JsonSerializable) {
            $data = $data->toArray();
        }

        return new JsonResponse($data, $statusCode, $headers);
    }
}
