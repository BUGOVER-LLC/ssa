<?php

declare(strict_types=1);

namespace Core\Core\Enum;

use Core\Core\Enum\Concerns\EnumConcern;

enum OauthClientType: string
{
    use EnumConcern;

    case password = 'password';

    case personal = 'personal';

    case public = 'public';

    case client = 'client';
}
