<?php

namespace Modules\Container\Validators;

use Core\Extensions\BaseValidator;

class CreateSourceValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'type' => ['required'],
            'title' => ['string'],
            'description' => ['string'],
        ];
    }
}
