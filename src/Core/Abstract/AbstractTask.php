<?php

declare(strict_types=1);

namespace Core\Abstract;

use Core\Contract\AbstractTaskContract;

abstract class AbstractTask implements AbstractTaskContract
{
    /**
     * @description method doesn't announce, only call when inject task class
     * @param mixed $context
     * @return mixed
     */
    final public function run(mixed $context): mixed
    {
        return $this->handle($context);
    }
}
