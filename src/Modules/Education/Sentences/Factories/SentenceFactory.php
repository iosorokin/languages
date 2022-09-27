<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Factories;

use Illuminate\Support\Arr;
use Modules\Container\Structures\ContainerStructure;
use Modules\Education\Sentences\Dto\CreateSentenceDto;
use Modules\Education\Sentences\Structures\SentenceModel;
use Modules\Education\Sentences\Structures\SentenceStructure;

final class SentenceFactory
{
    public function new(ContainerStructure $container, CreateSentenceDto $dto): SentenceStructure
    {
        $structure = new SentenceModel();
        $structure->setContainer($container);
        $structure->text = $dto->getText();

        return $structure;
    }
}
