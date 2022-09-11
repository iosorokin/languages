<?php

namespace Modules\Education\Source\Actions;

use App\Contracts\Structures\Education\SourceStructure;
use App\Contracts\Structures\Languages\LanguageStructure;
use Modules\Education\Source\Validators\CreateSourceValidator;

class CreateSource
{
    public function __construct(
        private CreateSourceValidator $validator,
    ) {}

    public function __invoke(LanguageStructure $language, array $attributes): SourceStructure
    {
        $attributes = $this->validator->validate($attributes);
    }


}
