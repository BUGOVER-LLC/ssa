<?php

declare(strict_types=1);

namespace Module\User\DTO;

use Core\Abstract\AbstractDTO;

readonly final class LoginUserDto extends AbstractDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public bool $remember = false,
    )
    {
    }
}
