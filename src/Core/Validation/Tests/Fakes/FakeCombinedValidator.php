<?php

declare(strict_types=1);

namespace Core\Validation\Tests\Fakes;

use Core\Validation\BaseCombinedValidator;

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
