<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Validators;

use Core\Extensions\BaseValidator;

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
