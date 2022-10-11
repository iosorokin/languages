<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Validators;

use App\Rules\Description;
use App\Rules\Title;
use Core\Validation\BaseValidator;

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
