<?php

declare(strict_types=1);

namespace Core\Validation\Tests\Fakes;

use Core\Validation\BaseValidator;

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
