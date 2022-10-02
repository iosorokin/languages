<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Validators;

use Core\Extensions\BaseValidator;

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
