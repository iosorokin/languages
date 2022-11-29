<?php

declare(strict_types=1);

namespace WIP\Core\Chapters\Validators;

use Core\Infrastructure\Support\Validation\BaseValidator;
use Core\Infrastructure\Support\Validation\Rules\Description;
use Core\Infrastructure\Support\Validation\Rules\Title;

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
