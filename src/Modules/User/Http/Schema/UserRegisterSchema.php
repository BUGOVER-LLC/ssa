<?php

declare(strict_types=1);

namespace Module\User\Http\Schema;

use Core\Abstract\AbstractSchema;

readonly class UserRegisterSchema extends AbstractSchema
{
    public function __construct(
        public int $id,
        public string $email,
        public string $full_name,
    )
    {
    }
}
