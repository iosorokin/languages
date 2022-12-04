<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Control\Cases\Dto\Validation;

use Core\Infrastructure\Support\Validation\BaseValidator;

final class CreateLanguageDtoValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'owner_id' => ['required', 'integer'],
            'code' => ['required', 'string'],
            'name' => ['required', 'string'],
            'nativeName' => ['required', 'string'],
        ];
    }
}
