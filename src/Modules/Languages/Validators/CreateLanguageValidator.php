<?php

declare(strict_types=1);

namespace Modules\Languages\Validators;

use Core\Extensions\BaseValidator;

final class CreateLanguageValidator extends LanguageValidator
{
    protected function rules(): array
    {
        $rules = [

        ];

        return $this->defaultRules() + $rules;
    }
}
