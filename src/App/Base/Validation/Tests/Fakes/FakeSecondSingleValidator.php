<?php

declare(strict_types=1);

namespace App\Base\Validation\Tests\Fakes;

use App\Base\Validation\BaseValidator;

final class FakeSecondSingleValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'surname' => ['string']
        ];
    }
}
