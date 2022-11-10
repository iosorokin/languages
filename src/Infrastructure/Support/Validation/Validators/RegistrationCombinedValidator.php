<?php

declare(strict_types=1);

namespace Infrastructure\Support\Validation\Validators;

use Infrastructure\Support\Validation\BaseCombinedValidator;
use Infrastructure\Support\Validation\Validators\Single\CreateUserValidator;

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
