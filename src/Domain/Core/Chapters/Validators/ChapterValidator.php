<?php

declare(strict_types=1);

namespace Domain\Core\Chapters\Validators;

use Infrastructure\Support\Validation\BaseValidator;
use Infrastructure\Support\Validation\Rules\Description;
use Infrastructure\Support\Validation\Rules\Title;

abstract class ChapterValidator extends BaseValidator
{
    protected function commonAttributesRules(): array
    {
        return [
            'title' => ['required', new Title()],
            'description' => [new Description()],
        ];
    }
}
