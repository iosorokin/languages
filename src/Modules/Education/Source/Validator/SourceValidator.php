<?php

declare(strict_types=1);

namespace Modules\Education\Source\Validator;

use App\Rules\Description;
use App\Rules\Title;
use Core\Extensions\BaseValidator;
use Illuminate\Validation\Rules\Enum;
use Modules\Education\Source\Enums\SourceType;

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
