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
            'containerable_type' => ['required'],
            'containerable_id'   => ['required', 'int'],
            'type' => ['required', new Enum(ContainerType::class)],
            'title' => ['string'],
            'description' => ['string'],
        ];
    }
}
