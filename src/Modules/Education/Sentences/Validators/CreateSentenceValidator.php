<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Validators;

use Core\Extensions\BaseValidator;

final class CreateSentenceValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'text' => ['required', 'string'],
        ];
    }
}
