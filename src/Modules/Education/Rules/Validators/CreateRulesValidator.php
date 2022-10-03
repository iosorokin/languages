<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Validators;


final class CreateRulesValidator extends RuleValidator
{
    protected function rules(): array
    {
        $rules = [

        ];

        return $this->commonRules() + $rules;
    }
}
