<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Validators;

use App\Rules\Description;
use Core\Base\Validation\BaseValidator;

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
