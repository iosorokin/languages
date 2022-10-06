<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Validators;

final class CreateLanguageValidator extends LanguageValidator
{
    protected function rules(): array
    {
        $rules = [

        ];

        return $this->defaultRules() + $rules;
    }
}
