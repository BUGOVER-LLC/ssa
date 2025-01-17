<?php

declare(strict_types=1);

namespace Infrastructure\Eloquent\Models;

use App\Model\BaseModel;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

final class UserSettings extends BaseModel
{
    use Cachable;

    protected $table = 'user_settings';

    protected $fillable = [];
}
