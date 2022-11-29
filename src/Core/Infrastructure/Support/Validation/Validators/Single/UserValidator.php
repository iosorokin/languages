<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Validation\Validators\Single;

use Core\Infrastructure\Support\Validation\BaseValidator;

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
