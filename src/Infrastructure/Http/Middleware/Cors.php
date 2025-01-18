<?php

declare(strict_types=1);

namespace Infrastructure\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;

class Cors
{
    /**
     * @param $request
     * @param Closure $next
     * @return Response|ResponseFactory|mixed
     */
    public function handle($request, Closure $next): mixed
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'POST, GET, PUT, DELETE, PATCH',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age' => '86400',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With',
        ];

        if ($request->isMethod('OPTIONS')) {
            return jsponse('{"method":"OPTIONS"}', \Symfony\Component\HttpFoundation\Response::HTTP_OK, $headers);
        }

        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}
