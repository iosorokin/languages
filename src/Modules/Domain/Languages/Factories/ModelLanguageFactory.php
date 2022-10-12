<?php

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Entities\LanguageModel;
use Modules\Domain\Languages\Validators\CreateLanguageValidator;
use Modules\Personal\User\Entities\User;

class ModelLanguageFactory extends BaseLanguageFactory
{
    protected function createStructure(): Language
    {
        return new LanguageModel();
    }
}
