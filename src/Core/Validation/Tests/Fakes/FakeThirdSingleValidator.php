<?php

declare(strict_types=1);

namespace Core\Validation\Tests\Fakes;

use Core\Validation\BaseValidator;

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
