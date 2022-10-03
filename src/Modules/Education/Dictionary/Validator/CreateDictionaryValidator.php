<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Validator;

final class CreateDictionaryValidator extends DictionaryValidator
{
    protected function rules(): array
    {
        $rules = [

        ];

        return $rules + $this->commonRules();
    }
}
