<?php

declare(strict_types=1);

namespace App\Validators\Single;

use App\Base\Validation\BaseValidator;

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
