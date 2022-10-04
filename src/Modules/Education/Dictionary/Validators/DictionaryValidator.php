<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Validators;

use App\Rules\BigIntId;
use App\Rules\Description;
use App\Rules\Title;
use Core\Extensions\BaseValidator;

abstract class DictionaryValidator extends BaseValidator
{
    protected function commonRules(): array
    {
        return [
            'language_id' => ['required', new BigIntId()],
            'description' => new Description(),
            'title' => new Title(),
        ];
    }
}
