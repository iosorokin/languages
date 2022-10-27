<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Validators;

use App\Rules\BigIntId;

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