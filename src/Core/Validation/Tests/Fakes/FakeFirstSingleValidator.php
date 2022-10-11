<?php

declare(strict_types=1);

namespace Core\Validation\Tests\Fakes;

use Core\Validation\BaseValidator;

final class FakeFirstSingleValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }
}
