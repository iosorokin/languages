<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Validators;

use Illuminate\Validation\Rules\Enum;
use Infrastructure\Support\Validation\BaseValidator;
use Infrastructure\Support\Validation\Rules\Description;
use Infrastructure\Support\Validation\Rules\Title;
use WIP\Core\Sources\Enums\SourceType;

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
