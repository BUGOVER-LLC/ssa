<?php

declare(strict_types=1);

namespace App\Core\Enum\Roles;

use App\Core\Enum\Concerns\EnumConcern;
use App\Core\Enum\Contracts\HasLabel;

enum Access: string implements HasLabel
{
    use EnumConcern;

    case create = 'create';

    case read = 'read';

    case delete = 'delete';

    case update = 'update';

    case copy = 'copy';

    #[\Override] public function getLabel(): ?string
    {
//        return match ($this) {
//        };
    }
}
