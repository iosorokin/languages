<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Validation\Validators;

use Core\Infrastructure\Support\Validation\BaseValidator;

final class CreateBaseAuthValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ];
    }
}
