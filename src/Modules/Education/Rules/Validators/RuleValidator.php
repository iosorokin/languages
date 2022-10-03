<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Validators;

use App\Rules\BigIntId;
use App\Rules\Description;
use App\Rules\Title;
use Core\Extensions\BaseValidator;

abstract class RuleValidator extends BaseValidator
{
    protected function commonRules(): array
    {
        return [
            'language_id' => ['required', new BigIntId()],
            'title' => [new Title()],
            'description' => [new Description()],
        ];
    }
}
