<?php

declare(strict_types=1);

namespace Module\User\DTO;

use Core\Abstract\AbstractDTO;

readonly final class RegisterUserDto extends AbstractDTO
{
    public function __construct(
        public string $username,
        public string $email,
        public string $password,
        public string $firstName,
        public string $lastName,
    )
    {
    }
}
