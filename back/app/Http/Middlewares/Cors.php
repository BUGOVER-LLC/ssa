<?php

declare(strict_types=1);

namespace App\Http\Middlewares;

use Closure;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;

use function in_array;

class Cors
{
    /**
     * @param $request
     * @param Closure $next
     * @return Response|ResponseFactory|mixed
     */
    public function handle($request, Closure $next): mixed
    {
        $allowedDomains = ['http://192.168.0.105:8080'];
        $origin = $request->server('HTTP_ORIGIN');

        if (in_array($origin, $allowedDomains, true)) {
            //Intercepts OPTIONS requests
            if ($request->isMethod('OPTIONS')) {
                $response = response('', 200);
            } else {
                // Pass the request to the next middleware
                $response = $next($request);
            }
            // Adds headers to the response
            $response->header('Access-Control-Allow-Origin', $origin);
            $response->header('Access-Control-Allow-Methods', 'OPTIONS, HEAD, GET, POST, PUT, PATCH, DELETE');
            $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        }

        // Sends it
        return $response;
    }
}
