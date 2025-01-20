<?php

declare(strict_types=1);

namespace Core\Enum\Roles;

use Core\Enum\Concerns\EnumConcern;
use Core\Enum\Contracts\HasLabel;

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
