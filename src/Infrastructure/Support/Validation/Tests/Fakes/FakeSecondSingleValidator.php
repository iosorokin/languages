<?php

declare(strict_types=1);

namespace Infrastructure\Support\Validation\Tests\Fakes;

use Infrastructure\Support\Validation\BaseValidator;

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
