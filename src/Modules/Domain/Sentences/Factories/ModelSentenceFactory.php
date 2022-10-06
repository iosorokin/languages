<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Factories;

use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sentences\Entities\SentenceModel;

final class ModelSentenceFactory implements SentenceFactory
{
    public function create(array $attributes): Sentence
    {
        $structure = new SentenceModel();
        $structure->setText($attributes['text']);

        return $structure;
    }
}
