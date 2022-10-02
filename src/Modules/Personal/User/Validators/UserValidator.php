<?php

declare(strict_types=1);

namespace Modules\Personal\User\Validators;

use Core\Extensions\BaseValidator;

abstract class UserValidator extends BaseValidator
{
    /**
     * @return array<mixed>
     */
    protected function defaultRules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:32']
        ];
    }
}
