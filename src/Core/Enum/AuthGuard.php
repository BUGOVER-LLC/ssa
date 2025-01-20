<?php

declare(strict_types=1);

namespace Core\Enum;

enum AuthGuard: string
{
    case web = 'web';

    case apiUsers = 'api_users';
}
