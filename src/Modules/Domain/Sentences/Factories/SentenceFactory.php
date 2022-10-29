<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Factories;

use Modules\Domain\Sentences\Model\Sentence;
use Modules\Domain\Sources\Structures\Source;

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
