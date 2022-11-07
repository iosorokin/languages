<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Validators;

use App\Base\Validation\BaseValidator;
use App\Rules\Description;
use App\Rules\Title;
use Domain\Core\Sources\Enums\SourceType;
use Illuminate\Validation\Rules\Enum;

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
