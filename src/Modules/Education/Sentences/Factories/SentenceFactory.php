<?php

namespace Modules\Education\Sentences\Factories;

use Modules\Container\Entites\Container;
use Modules\Education\Sentences\Entities\Sentence;

interface SentenceFactory
{
    public function create(array $attributes): Sentence;
}
