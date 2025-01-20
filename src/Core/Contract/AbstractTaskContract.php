<?php

declare(strict_types=1);

namespace Core\Contract;

use Closure;

interface AbstractTaskContract
{
    /**
     * @param mixed $context 😠
     * @param Closure|null $next
     * @return mixed
     */
    public function handle(mixed $context, ?Closure $next = null): mixed;
}
