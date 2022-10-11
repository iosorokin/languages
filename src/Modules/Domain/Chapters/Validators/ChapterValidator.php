<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Validators;

use App\Rules\Description;
use App\Rules\Title;
use Core\Validation\BaseValidator;

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
