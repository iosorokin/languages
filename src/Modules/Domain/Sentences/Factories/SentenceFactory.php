<?php

namespace Modules\Domain\Sentences\Factories;

use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Domain\Sources\Structures\Source;

interface SentenceFactory
{
    public function create(Source $source, array $attributes): Sentence;
}
