<?php

declare(strict_types=1);

namespace Core\Base\Validation\Tests\Fakes;

use Core\Base\Validation\BaseValidator;

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
