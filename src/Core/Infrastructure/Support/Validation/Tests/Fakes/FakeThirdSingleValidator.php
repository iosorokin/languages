<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Validation\Tests\Fakes;

use Core\Infrastructure\Support\Validation\BaseValidator;

final class FakeThirdSingleValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'count' => ['required', 'int'],
            'min' => ['required', 'int'],
            'max' => ['required', 'int'],
        ];
    }
}
