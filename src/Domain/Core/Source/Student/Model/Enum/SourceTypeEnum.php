<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Model\Enum;

enum SourceTypeEnum: string
{
    case Movie = 'movie';

    case Song = 'song';
}
