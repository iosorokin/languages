<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Validation\Validators;

use Core\Infrastructure\Support\Validation\BaseValidator;

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
