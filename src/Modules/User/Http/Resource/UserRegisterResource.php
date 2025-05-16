<?php

declare(strict_types=1);

namespace Module\User\Http\Resource;

use Core\Abstract\AbstractResource;
use Core\Abstract\AbstractSchema;
use Illuminate\Http\Request;
use Module\User\Entity\User;
use Module\User\Http\Schema\UserRegisterSchema;

/**
 * @property-read User $resource
 */
class UserRegisterResource extends AbstractResource
{
    public function toSchema(Request $request): AbstractSchema|string
    {
        return new UserRegisterSchema(
            id: $this->resource->getId(),
            email: $this->resource->getEmail(),
            full_name: $this->resource->getFullName(),
        );
    }
}
