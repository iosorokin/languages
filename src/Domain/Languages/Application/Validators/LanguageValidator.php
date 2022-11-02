<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Validators;

use App\Base\Validation\BaseValidator;

abstract class LanguageValidator extends BaseValidator
{
    protected function commonRules(): array
    {
        return [
            'name' => ['string'],
            'native_name' => ['string'],
            'code' => ['string'],
        ];
    }
}
