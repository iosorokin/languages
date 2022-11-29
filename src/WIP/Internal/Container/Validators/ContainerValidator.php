<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Validators;

use Core\Infrastructure\Support\Validation\BaseValidator;
use Core\Infrastructure\Support\Validation\Rules\Description;
use Core\Infrastructure\Support\Validation\Rules\Title;

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
