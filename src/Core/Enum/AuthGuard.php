<?php

declare(strict_types=1);

namespace App\Core\Enum;

enum AuthGuard: string
{
    case web = 'web';

    case apiUsers = 'api_users';
}
