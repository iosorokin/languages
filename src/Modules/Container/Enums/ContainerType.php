<?php

declare(strict_types=1);

namespace Modules\Container\Enums;

enum ContainerType: string
{
    case Wrapper = 'wrapper';

    case Chapter = 'chapter';

    public function isRaw(): bool
    {
        return $this->value === self::Wrapper->value;
    }

    public function isChapter(): bool
    {
        return $this->value === self::Wrapper->value;
    }
}
