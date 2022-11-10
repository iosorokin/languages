<?php

declare(strict_types=1);

namespace Infrastructure\Support\Validation\Tests\Fakes;

use Infrastructure\Support\Validation\BaseValidator;

final class FakeFouthSingleValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'oldest' => ['bool'],
            'newest' => ['bool'],
        ];
    }
}
