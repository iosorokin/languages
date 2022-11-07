<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Factories;

use Domain\Core\Sentences\Model\Sentence;
use Domain\Core\Sources\Structures\Source;

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
