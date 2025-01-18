<?php

declare(strict_types=1);

namespace Infrastructure\Kernel;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, .etc.
     *
     * @param Throwable $exception
     * @return void
     *
     * @throws Exception
     */
    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $exception
     * @return JsonResponse
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception): JsonResponse
    {
        return $this->renderException($request, $exception);
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function renderException($request, $e): JsonResponse
    {
        $status = 500;

        if ($e instanceof HttpExceptionInterface) {
            $status = $e->getStatusCode();
        }

        $message = match ($status) {
            401 => '' !== $e->getMessage() ? $e->getMessage() : 'Unauthorized.',
            403 => '' !== $e->getMessage() ? $e->getMessage() : 'Forbidden.',
            404 => '' !== $e->getMessage() ? $e->getMessage() : 'Not Found.',
            405 => '' !== $e->getMessage() ? $e->getMessage() : 'Method Not Allowed.',
            500 => (app()->environment(
                'production'
            )) ? 'Whoops, looks like something went wrong.' : $e->getMessage(),
            503 => 'The server is currently unable to handle the request due to a temporary overloading or maintenance of the server.',
            default => $e->getMessage(),
        };

        $data = [
            'success' => false,
            'status' => $status,
            'message' => $message,
        ];

        if (!app()->environment('production')) {
            $data['exception'] = (string) $e;
            $data['line'] = $e->getLine();
            $data['file'] = $e->getFile();
        }

        return response()->json($data, $status);
    }
}
