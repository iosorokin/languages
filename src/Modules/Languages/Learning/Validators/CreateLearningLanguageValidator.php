<?php

namespace Modules\Languages\Learning\Validators;

use Core\Extensions\BaseValidator;

class CreateLearningLanguageValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'title' => ['string', 'max:255']
        ];
    }
}
