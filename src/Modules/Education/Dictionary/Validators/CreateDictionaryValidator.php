<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Validators;

final class CreateDictionaryValidator extends DictionaryValidator
{
    protected function rules(): array
    {
        $rules = [

        ];

        return $rules + $this->commonRules();
    }
}
