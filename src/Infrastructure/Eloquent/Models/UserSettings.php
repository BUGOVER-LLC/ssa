<?php

declare(strict_types=1);

namespace Infrastructure\Eloquent\Models;

use Core\Model\BaseModel;

final class UserSettings extends BaseModel
{
    protected $table = 'user_settings';

    protected $fillable = [];
}
