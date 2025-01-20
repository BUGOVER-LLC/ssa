<?php

declare(strict_types=1);

namespace Module\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Http\Controller;
use RuntimeException;

final class LogoutController extends Controller
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
     */
    public function logoutOther(): JsonResponse
    {
        $user = Auth::user();

        if (!$user) {
            throw new RuntimeException();
        }

        Auth::logoutOtherDevices();
        return $this->response('logout');
    }
}
