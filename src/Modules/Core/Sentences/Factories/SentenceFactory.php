<?php

namespace Modules\Core\Sentences\Factories;

use Modules\Core\Sentences\Entities\Sentence;

interface SentenceFactory
{
    public function create(array $attributes): Sentence;
}
