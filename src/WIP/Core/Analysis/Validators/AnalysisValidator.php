<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Validators;

use Core\Infrastructure\Support\Validation\BaseValidator;
use Core\Infrastructure\Support\Validation\Rules\Description;

abstract class AnalysisValidator extends BaseValidator
{
    protected function commonRules(): array
    {
        return [
            'translate' => ['required', 'string'],
            'description' => ['required', new Description()],
        ];
    }
}
