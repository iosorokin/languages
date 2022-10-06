<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Validators;

use App\Rules\Description;
use App\Rules\Title;
use Core\Extensions\BaseValidator;
use Illuminate\Validation\Rules\Enum;
use Modules\Core\Sources\Enums\SourceType;

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
