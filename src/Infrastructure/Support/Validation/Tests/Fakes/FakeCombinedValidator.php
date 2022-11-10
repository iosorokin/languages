<?php

declare(strict_types=1);

namespace Infrastructure\Support\Validation\Tests\Fakes;

use Infrastructure\Support\Validation\BaseCombinedValidator;

final class FakeCombinedValidator extends BaseCombinedValidator
{
    protected function validators(): array
    {
        return [
            new FakeFirstSingleValidator(),
            FakeSecondSingleValidator::class,
            FakeThirdSingleValidator::class
        ];
    }
}
