<?php

declare(strict_types=1);

namespace Modules\Personal\Validators;

use Core\Base\Validation\BaseCombinedValidator;
use Modules\Personal\Contexts\BaseAuth\Validators\CreateBaseAuthValidator;
use Modules\Personal\Validators\Single\CreateUserValidator;

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
