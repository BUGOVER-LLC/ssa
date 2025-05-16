<?php

declare(strict_types=1);

namespace Module\User\Http\Schema;

use Core\Abstract\AbstractSchema;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(schema: UserRegisterSchema::class, title: 'User Register', properties: [
    new Property(property: 'id', title: 'ID', type: 'integer'),
    new Property(property: 'email', title: 'Email', type: 'string'),
    new Property(property: 'full_name', title: 'Full Name', type: 'string'),
])]
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
