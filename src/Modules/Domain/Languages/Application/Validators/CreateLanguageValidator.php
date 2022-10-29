<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Validators;

final class CreateLanguageValidator extends LanguageValidator
{
    protected function rules(): array
    {
        $rules = [
            'name' => ['required'],
            'native_name' => ['required'],
            'code' => ['required'],
        ];

        return array_merge_recursive($this->commonRules() , $rules);
    }
}
