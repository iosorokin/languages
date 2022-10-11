<?php

declare(strict_types=1);

namespace Core\Base\Validation\Tests\Fakes;

use Core\Base\Validation\BaseValidator;

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
