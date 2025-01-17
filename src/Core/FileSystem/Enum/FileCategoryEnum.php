<?php

declare(strict_types=1);

namespace App\FileSystem\Enum;

use App\FileSystem\Enum\Concerns\EnumConcern;

enum FileCategoryEnum: string
{
    use EnumConcern;

    case FILE = 'file';
    case IMAGE = 'image';
    case AUDIO = 'audio';
}
