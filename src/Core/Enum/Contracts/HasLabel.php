<?php

declare(strict_types=1);

namespace Core\Core\Enum\Contracts;

interface HasLabel
{
    public function getLabel(): ?string;
}
