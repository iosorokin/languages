<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Validators;

use Infrastructure\Support\Validation\BaseValidator;

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
