<?php

declare(strict_types=1);

namespace Domain\Sentences\Factories;

use Domain\Sentences\Model\Sentence;
use Domain\Sources\Structures\Source;

final class SentenceFactory
{
    public function create(Source $source, array $attributes): Sentence
    {
        $sentence = new Sentence();
        $sentence->source()->associate($source);
        $sentence->text = $attributes['text'];

        return $sentence;
    }
}
