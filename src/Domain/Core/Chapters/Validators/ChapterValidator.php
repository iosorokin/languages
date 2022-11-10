<?php

declare(strict_types=1);

namespace Domain\Core\Chapters\Validators;

use App\Base\Validation\BaseValidator;
use App\Support\Validation\Rules\Description;
use App\Support\Validation\Rules\Title;

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
