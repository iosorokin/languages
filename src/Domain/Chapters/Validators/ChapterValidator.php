<?php

declare(strict_types=1);

namespace Domain\Chapters\Validators;

use App\Base\Validation\BaseValidator;
use App\Rules\Description;
use App\Rules\Title;

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
