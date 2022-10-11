<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Validators;

use Core\Base\Validation\BaseValidator;

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
