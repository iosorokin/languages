<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Validators;

use Core\Extensions\BaseValidator;

abstract class LanguageValidator extends BaseValidator
{
    protected function defaultRules(): array
    {
        return [
            'name' => ['required'],
            'native_name' => ['required'],
            'code' => ['required'],
        ];
    }
}
