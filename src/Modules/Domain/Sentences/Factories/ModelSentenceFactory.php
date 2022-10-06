<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Factories;

use Modules\Core\Sentences\Entities\Sentence;
use Modules\Core\Sentences\Entities\SentenceModel;

final class ModelSentenceFactory implements SentenceFactory
{
    public function create(array $attributes): Sentence
    {
        $structure = new SentenceModel();
        $structure->setText($attributes['text']);

        return $structure;
    }
}
