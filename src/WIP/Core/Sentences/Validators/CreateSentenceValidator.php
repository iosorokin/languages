<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Validators;

use Core\Infrastructure\Support\Validation\Rules\BigIntId;

final class CreateSentenceValidator extends SentenceValidator
{
    protected function rules(): array
    {
        $rules = [
            'source_id' => ['required', new BigIntId()],
            'chapter_id' => [new BigIntId()],
            'text' => ['required', 'string']
        ];

        return $this->defaultRules() + $rules;
    }
}
