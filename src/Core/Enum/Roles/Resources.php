<?php

declare(strict_types=1);

namespace Core\Core\Enum\Roles;

use Core\Core\Enum\Concerns\EnumConcern;
use Core\Core\Enum\Contracts\HasLabel;
use Override;

enum Resources: string implements HasLabel
{
    use EnumConcern;

    #[Override]
    public function getLabel(): ?string
    {
//        return match ($this) {
//        };
    }
}
