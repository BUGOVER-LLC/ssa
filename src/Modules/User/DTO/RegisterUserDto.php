<?php

declare(strict_types=1);

namespace Module\User\DTO;

class RegisterUserDto
{
    public function __construct(
        public readonly string $username,
        public readonly string $email,
        public readonly string $password,
        public readonly string $firstName,
        public readonly string $lastName,
    )
    {
    }
}
