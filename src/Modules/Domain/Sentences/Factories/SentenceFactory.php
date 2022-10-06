<?php

namespace Modules\Domain\Sentences\Factories;

use Modules\Domain\Sentences\Entities\Sentence;

interface SentenceFactory
{
    public function create(array $attributes): Sentence;
}
