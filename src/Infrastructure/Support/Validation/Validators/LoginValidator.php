<?php

declare(strict_types=1);

namespace Infrastructure\Support\Validation\Validators;

use Infrastructure\Support\Validation\BaseValidator;

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
