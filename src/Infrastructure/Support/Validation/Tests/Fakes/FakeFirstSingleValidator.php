<?php

declare(strict_types=1);

namespace Infrastructure\Support\Validation\Tests\Fakes;

use Infrastructure\Support\Validation\BaseValidator;

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
