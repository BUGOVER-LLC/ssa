<?php

declare(strict_types=1);

namespace Modules\Users\Models;

use App\Model\BaseModel;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class UserSettings extends BaseModel
{
    use Cachable;

    protected $table = 'user_settings';

    protected $fillable = [];
}
