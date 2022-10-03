<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Factories;

use Modules\Container\Entites\Container;
use Modules\Education\Sentences\Entities\SentenceModel;
use Modules\Education\Sentences\Entities\Sentence;

final class ModelSentenceFactory implements SentenceFactory
{
    public function new(Container $container, array $attributes): Sentence
    {
        $structure = new SentenceModel();
        $structure->setContainer($container);
        $structure->text = $attributes['text'];

        return $structure;
    }
}
