<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Validators;

use Domain\Core\Sources\Enums\SourceType;
use Illuminate\Validation\Rules\Enum;
use Infrastructure\Support\Validation\BaseValidator;
use Infrastructure\Support\Validation\Rules\Description;
use Infrastructure\Support\Validation\Rules\Title;

abstract class SourceValidator extends BaseValidator
{
    protected function defaultRules(): array
    {
        return [
            'title' => new Title(),
            'description' => new Description(),
            'type' => new Enum(SourceType::class),
        ];
    }
}
