<?php

declare(strict_types=1);

namespace Core\Enum;

use Core\Enum\Concerns\EnumConcern;

enum OauthClientType: string
{
    use EnumConcern;

    case password = 'password';

    case personal = 'personal';

    case public = 'public';

    case client = 'client';
}
