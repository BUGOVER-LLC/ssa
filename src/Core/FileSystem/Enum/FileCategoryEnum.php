<?php

declare(strict_types=1);

namespace Core\FileSystem\Enum;

use Core\FileSystem\Enum\Concerns\EnumConcern;

enum FileCategoryEnum: string
{
    use EnumConcern;

    case FILE = 'file';
    case IMAGE = 'image';
    case AUDIO = 'audio';
}
