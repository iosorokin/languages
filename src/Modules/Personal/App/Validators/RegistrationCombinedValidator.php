<?php

declare(strict_types=1);

namespace Modules\Personal\App\Validators;

use Core\Base\Validation\BaseCombinedValidator;
use Modules\Personal\App\Validators\Single\CreateUserValidator;
use Modules\Personal\Domain\Contexts\BaseAuth\Validators\CreateBaseAuthValidator;

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
