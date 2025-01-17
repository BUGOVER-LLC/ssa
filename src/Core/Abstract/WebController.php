<?php

declare(strict_types=1);

namespace App\Abstract;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Infrastructure\Http\Controllers\Access\UserHasAccess;
use Infrastructure\Http\Controllers\Controller;

abstract class WebController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;
    use UserHasAccess;
}
