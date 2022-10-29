<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Enums;

enum SourceType: string
{
    case Movie = 'movie';

    case Song = 'song';
}
