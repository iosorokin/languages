<?php

namespace Modules\Domain\Languages\Factories\Structure;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Structures\LanguageModel;

class ModelLanguageFactory extends BaseLanguageStructureFactory
{
    protected function createStructure(): Language
    {
        return new LanguageModel();
    }
}
