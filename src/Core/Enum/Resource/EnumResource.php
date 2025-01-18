<?php

declare(strict_types=1);

namespace Core\Core\Enum\Resource;

use Core\Core\Abstract\AbstractResource;
use Core\Core\Abstract\AbstractSchema;
use Core\Core\Enum\Schema\EnumSchema;
use Enum;
use Illuminate\Http\Request;

/**
 * @property-read Enum $resource
 */
class EnumResource extends AbstractResource
{
    public function toSchema(Request $request): AbstractSchema
    {
        return new EnumSchema(
            name: method_exists($this->resource, 'getLabel')
                ? $this->resource->getLabel()
                : $this->resource->name,
            value: $this->resource->value
        );
    }
}
