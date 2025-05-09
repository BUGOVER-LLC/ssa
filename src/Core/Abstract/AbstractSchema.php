<?php

declare(strict_types=1);

namespace Core\Abstract;

use Illuminate\Contracts\Support\Arrayable;

readonly abstract class AbstractSchema implements Arrayable
{
    final public function toArray(): array
    {
        return collect(get_object_vars($this))->toArray();
    }
}
