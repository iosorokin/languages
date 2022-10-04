<?php

declare(strict_types=1);

namespace Modules\Container\Enums;

enum ElementType: string
{
    case Rule = 'rule';

    case Sentence = 'sentence';

    case Container = 'container';
}
