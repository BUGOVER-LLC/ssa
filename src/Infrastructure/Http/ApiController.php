<?php

declare(strict_types=1);

namespace Infrastructure\Http;

use Core\Abstract\BaseController;
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
    )
]), Response(response: '200', description: 'An example resource')]
abstract class ApiController extends BaseController
{
}
