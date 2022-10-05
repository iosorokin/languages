<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Validators;

final class CreateSentenceValidator extends SentenceValidator
{
    protected function rules(): array
    {
        $rules = [
            'container_id' => ['required', 'int'],
            'text' => ['required', 'string']
        ];

        return $this->defaultRules() + $rules;
    }
}
