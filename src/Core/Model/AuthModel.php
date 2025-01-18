<?php

declare(strict_types=1);

namespace Core\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

abstract class AuthModel extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable;
    use Authorizable;
}
