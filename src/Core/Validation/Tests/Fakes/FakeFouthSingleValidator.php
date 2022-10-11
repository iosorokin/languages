<?php

declare(strict_types=1);

namespace Core\Validation\Tests\Fakes;

use Core\Validation\BaseValidator;

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
