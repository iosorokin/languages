<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Validation\Validators;

use Core\Infrastructure\Support\Validation\BaseCombinedValidator;
use Core\Infrastructure\Support\Validation\Validators\Single\CreateUserValidator;

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
