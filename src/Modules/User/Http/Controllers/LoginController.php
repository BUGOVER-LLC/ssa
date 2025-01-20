<?php

declare(strict_types=1);

namespace Module\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Http\Controller;
use Module\User\Http\Requests\LoginRequest;

//use Src\Core\Additional\MainDevicer;

final class LoginController extends Controller
{
    private const CREDENTIALS = [
        'email',
        'password',
    ];

    public function __construct(/*private readonly MainDevicer $devicer*/)
    {
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        // Check
        $credentials = $request->only(self::CREDENTIALS);
        if (!$token = Auth::attempt($credentials, $request->remember)) {
            return $this->response(['errors' => ['login' => [__('auth.failed')]]], 423);
        }
        $data = [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ];
        $user = Auth::user()->toArray();
        $data = array_merge($data, $user);

//        $this->devicer->device();

        return $this->response($data);
    }
}
