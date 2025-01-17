<?php

declare(strict_types=1);

namespace App\Core\Enum\Roles;

use App\Core\Enum\Concerns\EnumConcern;
use App\Core\Enum\Contracts\HasLabel;

enum Role: string implements HasLabel
{
    use EnumConcern;


    public function getLabel(): ?string
    {
//        return match ($this) {
//        };
    }
}
