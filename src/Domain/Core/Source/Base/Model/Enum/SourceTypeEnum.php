<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Model\Enum;

enum SourceTypeEnum: string
{
    case Movie = 'movie';

    case Song = 'song';
}
