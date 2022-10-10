<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Factories;

use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sentences\Entities\SentenceModel;
use Modules\Domain\Sources\Entities\Source;

final class ModelSentenceFactory implements SentenceFactory
{
    public function create(Source $source, array $attributes): Sentence
    {
        $sentence = new SentenceModel();
        $sentence->setSource($source);
        $sentence->setText($attributes['text']);

        return $sentence;
    }
}
