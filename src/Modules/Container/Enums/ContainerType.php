<?php

declare(strict_types=1);

namespace Modules\Container\Enums;

enum ContainerType: string
{
    case Raw = 'raw';

    case Chapter = 'chapter';

    public function isRaw(): bool
    {
        return $this->value === self::Raw->value;
    }

    public function isChapter(): bool
    {
        return $this->value === self::Raw->value;
    }
}
