<?php

declare(strict_types=1);

namespace App\Core\Enum\Roles;

use App\Core\Enum\Concerns\EnumConcern;
use App\Core\Enum\Contracts\HasLabel;
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
