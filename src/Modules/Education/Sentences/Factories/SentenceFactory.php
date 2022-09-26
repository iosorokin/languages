<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Factories;

use Modules\Education\Sentences\Structures\SentenceModel;
use Modules\Education\Sentences\Structures\SentenceStructure;

final class SentenceFactory
{
    public function new(array $attributes): SentenceStructure
    {
        $structure = new SentenceModel();

        return $structure;
    }
}
