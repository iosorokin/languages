<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Validators;

use Infrastructure\Support\Validation\BaseValidator;
use Infrastructure\Support\Validation\Rules\Description;

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
