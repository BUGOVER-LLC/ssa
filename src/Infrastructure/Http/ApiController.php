<?php

declare(strict_types=1);

namespace Infrastructure\Http;

use Core\Abstract\BaseController;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes\Info;
use OpenApi\Attributes\PathItem;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Server;

#[
    Info(
        version: '0.6',
        description: '
    # Authorization
      - accessToken** valid for 30 days
      - refreshToken** valid for 90 days
      - accessUuid** valid unlimint user sync.
        ',
        title: 'API main service'
    )
]
#[PathItem(path: '/api/resource.json', servers: [
    new Server(
        url: 'https://adcourt.asd.am/api'
    ),
]), Response(response: '200', description: 'An example resource')]
abstract class ApiController extends BaseController
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
        if ($data instanceof Arrayable && !$data instanceof \JsonSerializable) {
            $data = $data->toArray();
        }

        return new JsonResponse($data, $status_code, $headers);
    }
}
