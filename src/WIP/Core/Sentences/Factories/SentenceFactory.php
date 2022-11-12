<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Factories;

use WIP\Core\Sentences\Model\Sentence;
use WIP\Core\Sources\Structures\Source;

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
