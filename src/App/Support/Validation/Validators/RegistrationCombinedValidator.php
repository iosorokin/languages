<?php

declare(strict_types=1);

namespace App\Support\Validation\Validators;

use App\Base\Validation\BaseCombinedValidator;
use App\Support\Validation\Validators\Single\CreateUserValidator;

final class RegistrationCombinedValidator extends BaseCombinedValidator
{
    protected function validators(): array
    {
        return [
            CreateUserValidator::class,
            CreateBaseAuthValidator::class,
        ];
    }
}
