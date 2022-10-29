<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Validators;

use Core\Base\Validation\BaseValidator;

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
