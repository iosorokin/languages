<?php

declare(strict_types=1);

namespace App\Base\Validation\Tests\Fakes;

use App\Base\Validation\BaseValidator;

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
