<?php

declare(strict_types=1);

namespace App\Validators;

use App\Base\Validation\BaseValidator;

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
