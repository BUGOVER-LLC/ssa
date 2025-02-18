<?php

declare(strict_types=1);

namespace Core\Enum\Schema;

use Core\Abstract\AbstractSchema;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(schema: EnumSchema::class, title: 'EnumSchema', properties: [
    new Property(property: 'name', type: 'string'),
    new Property(property: 'value', type: ['string', 'integer']),
])]
class EnumSchema extends AbstractSchema
{
    /**
     * @param string|int $name
     * @param string|int $value
     */
    public function __construct(
        public readonly string|int $name,
        public readonly string|int $value,
    )
    {
    }
}
