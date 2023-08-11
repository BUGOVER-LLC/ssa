<?php

declare(strict_types=1);

namespace Modules\Users\Controllers;

use App\Http\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Users\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        // Check
        $credentials = $request->only(['email', 'password']);
        if (!$token = Auth::attempt($credentials)) {
            return $this->response(['errors' => ['login' => [__('auth.failed')]]], 423);
        }

        // Data
        $data = [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ];
        $user = Auth::user()->toArray();
        $data = array_merge($data, $user);

        // Final Response
        return $this->response($data);
    }
}
