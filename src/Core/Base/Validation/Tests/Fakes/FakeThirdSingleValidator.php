<?php

declare(strict_types=1);

namespace Core\Base\Validation\Tests\Fakes;

use Core\Base\Validation\BaseValidator;

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
