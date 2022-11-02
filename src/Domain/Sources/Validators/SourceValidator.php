<?php

declare(strict_types=1);

namespace Domain\Sources\Validators;

use App\Base\Validation\BaseValidator;
use App\Rules\Description;
use App\Rules\Title;
use Illuminate\Validation\Rules\Enum;
use Domain\Sources\Enums\SourceType;

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
