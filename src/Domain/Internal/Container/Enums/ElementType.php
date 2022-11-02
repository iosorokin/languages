<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Enums;

enum ElementType: string
{
    case Sentence = 'sentence';

    case Container = 'container';
}
