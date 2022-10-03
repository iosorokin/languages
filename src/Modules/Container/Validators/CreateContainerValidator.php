<?php

namespace Modules\Container\Validators;

use Core\Extensions\BaseValidator;
use Illuminate\Validation\Rules\Enum;
use Modules\Container\Enums\ContainerType;

class CreateContainerValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'type' => ['required', new Enum(ContainerType::class)],
        ];
    }
}
