<?php

declare(strict_types=1);

namespace Modules\Users\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use Cachable;

    protected $table = 'user_settings';

    protected $fillable = [];
}
