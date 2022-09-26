<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Factories;

use Illuminate\Support\Arr;
use Modules\Container\Structures\ContainerStructure;
use Modules\Education\Sentences\Structures\SentenceModel;
use Modules\Education\Sentences\Structures\SentenceStructure;

final class SentenceFactory
{
    public function new(ContainerStructure $container, array $attributes): SentenceStructure
    {
        $structure = new SentenceModel();
        $structure->setContainer($container);
        $structure->text = Arr::get($attributes, 'text');

        return $structure;
    }
}
