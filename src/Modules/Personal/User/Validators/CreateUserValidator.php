<?php

namespace Modules\Personal\User\Validators;

use Core\Extensions\BaseValidator;

class CreateUserValidator extends BaseValidator
{
    /**
     * @return array<mixed>
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:32']
        ];
    }
}
