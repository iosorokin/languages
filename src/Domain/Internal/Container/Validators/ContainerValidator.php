<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Validators;

use App\Base\Validation\BaseValidator;
use App\Rules\Description;
use App\Rules\Title;

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
