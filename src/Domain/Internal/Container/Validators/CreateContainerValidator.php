<?php

namespace Domain\Internal\Container\Validators;

use Illuminate\Validation\Rules\Enum;
use Domain\Internal\Container\Enums\ContainerType;

class CreateContainerValidator extends ContainerValidator
{
    protected function rules(): array
    {
        $rules = [
            'type' => ['required', new Enum(ContainerType::class)],
        ];

        return $rules + $this->commonRules();
    }
}
