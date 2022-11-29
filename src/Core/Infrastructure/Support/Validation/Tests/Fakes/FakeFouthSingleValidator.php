<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Validation\Tests\Fakes;

use Core\Infrastructure\Support\Validation\BaseValidator;

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
