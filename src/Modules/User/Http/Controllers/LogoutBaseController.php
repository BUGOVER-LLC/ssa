<?php

declare(strict_types=1);

namespace Module\User\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Http\ApiController;
use Infrastructure\Http\WebController;
use RuntimeException;

final class LogoutBaseController extends ApiController
{
    /**
     * @return JsonResponse
     */
    public function logoutCurrent(): JsonResponse
    {
        $user = Auth::user();

        if (!$user) {
            throw new RuntimeException();
        }

        Auth::logoutCurrentDevice();

        return $this->response('logout');
    }

    /**
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function logoutAll(): JsonResponse
    {
        $user = Auth::user();

        if (!$user) {
            throw new RuntimeException();
        }

        $this->logoutOther();
        Auth::logout();

        return $this->response('logout');
    }

    /**
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function logoutOther(): JsonResponse
    {
        $user = Auth::user();

        if (!$user) {
            throw new RuntimeException();
        }

        Auth::logoutOtherDevices($user->getPassword());

        return $this->response('logout');
    }
}
