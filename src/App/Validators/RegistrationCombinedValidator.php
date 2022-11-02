<?php

declare(strict_types=1);

namespace App\Validators;

use App\Base\Validation\BaseCombinedValidator;
use App\Validators\Single\CreateUserValidator;

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
