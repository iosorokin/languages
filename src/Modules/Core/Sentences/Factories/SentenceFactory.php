<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Factories;

use Modules\Core\Sentences\Model\Sentence;
use Modules\Core\Sources\Structures\Source;

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
