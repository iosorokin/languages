<?php

declare(strict_types=1);

namespace Modules\Personal\User\Validators;

use Core\Validation\BaseCombinedValidator;
use Modules\Personal\Auth\Validators\CreateBaseAuthValidator;
use Modules\Personal\User\Validators\Single\CreateUserValidator;

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
