<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Validators;

use Infrastructure\Support\Validation\BaseValidator;
use Infrastructure\Support\Validation\Rules\Description;
use Infrastructure\Support\Validation\Rules\Title;

abstract class ContainerValidator extends BaseValidator
{
    protected function commonRules(): array
    {
        return [
            'title' => [new Title()],
            'description' => [new Description()]
        ];
    }
}
