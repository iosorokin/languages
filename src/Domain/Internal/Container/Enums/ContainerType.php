<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Enums;

enum ContainerType: string
{
    case Wrapper = 'wrapper';

    case Chapter = 'chapter';

    public function isWrapper(): bool
    {
        return $this->value === self::Wrapper->value;
    }

    public function isChapter(): bool
    {
        return $this->value === self::Wrapper->value;
    }
}
