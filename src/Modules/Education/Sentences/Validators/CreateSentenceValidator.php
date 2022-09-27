<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Validators;

use Core\Extensions\BaseValidator;

final class CreateSentenceValidator extends SentenceValidator
{
    protected function rules(): array
    {
        $rules = [
            'container_id' => ['required', 'int']
        ];

        return $this->defaultRules() + $rules;
    }
}
