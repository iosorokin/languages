<?php

namespace Modules\Domain\Sentences\Factories;

use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sources\Entities\Source;

interface SentenceFactory
{
    public function create(Source $source, array $attributes): Sentence;
}
