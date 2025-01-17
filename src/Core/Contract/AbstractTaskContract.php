<?php

declare(strict_types=1);

namespace App\Contract;

use Closure;

interface AbstractTaskContract
{
    /**
     * @param mixed $context 😠
     * @param Closure|null $next
     * @return mixed
     */
    public function handle(mixed $context, ?Closure $next = null);
}
