<?php

declare(strict_types=1);

namespace Modules\Container\Validators;

use App\Rules\Description;
use App\Rules\Title;
use Core\Extensions\BaseValidator;

abstract class CreateContainer extends BaseValidator
{
    protected function commonRules(): array
    {
        return [
            'title' => [new Title()],
            'description' => [new Description()]
        ];
    }
}
