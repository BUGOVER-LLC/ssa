<?php

declare(strict_types=1);

namespace Core\Abstract;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;
use JsonSerializable;
use Laravel\Lumen\Routing\Controller as BaseSystemController;

abstract class BaseController extends BaseSystemController
{
    /**
     * Create a json response.
     *
     * @param mixed $data
     * @param int $status_code
     * @param array $headers
     *
     * @return JsonResponse
     */
    protected function response(mixed $data, int $status_code = 200, array $headers = []): JsonResponse
    {
        if ($data instanceof Arrayable && !$data instanceof JsonSerializable) {
            $data = $data->toArray();
        }

        return new JsonResponse($data, $status_code, $headers);
    }
}
