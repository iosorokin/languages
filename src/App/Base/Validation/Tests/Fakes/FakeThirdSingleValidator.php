<?php

declare(strict_types=1);

namespace App\Base\Validation\Tests\Fakes;

use App\Base\Validation\BaseValidator;

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
