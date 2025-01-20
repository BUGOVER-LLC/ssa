<?php

declare(strict_types=1);

namespace Core\Enum\Roles;

use Core\Enum\Concerns\EnumConcern;
use Core\Enum\Contracts\HasLabel;
use Override;

enum Attribute: string implements HasLabel
{
    use EnumConcern;

    #[Override] public function getLabel(): ?string
    {
//        return match ($this) {
//        };
    }
}
