<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Control\Cases\Dto\Validation;

use Core\Infrastructure\Support\Validation\BaseValidator;

final class DeleteLanguageDtoValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'code' => ['required', 'string'],
        ];
    }
}
