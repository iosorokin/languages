<?php

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Structures\LanguageModel;
use Modules\Domain\Languages\Validators\CreateLanguageValidator;
use Modules\Personal\User\Structures\User;

class ModelLanguageFactory extends BaseLanguageFactory
{
    protected function createStructure(): Language
    {
        return new LanguageModel();
    }
}
