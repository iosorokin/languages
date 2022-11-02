<?php

declare(strict_types=1);

namespace Domain\Sentences\Validators;

use App\Base\Validation\BaseValidator;

abstract class SentenceValidator extends BaseValidator
{
    /**
     * @return array<mixed>
     */
    protected function defaultRules(): array
    {
        return [
            'text' => ['required', 'string'],
        ];
    }
}
