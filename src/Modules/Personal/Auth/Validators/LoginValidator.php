<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Validators;

use Core\Base\Validation\BaseValidator;

final class LoginValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }
}
