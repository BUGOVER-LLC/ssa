<?php

declare(strict_types=1);

namespace Core\Enum\Roles;

use Core\Enum\Concerns\EnumConcern;
use Core\Enum\Contracts\HasLabel;

enum Role: string implements HasLabel
{
    use EnumConcern;


    public function getLabel(): ?string
    {
//        return match ($this) {
//        };
    }
}
