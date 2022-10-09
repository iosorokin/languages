<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Validators;

use App\Rules\Description;
use App\Rules\Title;
use Core\Extensions\BaseValidator;

abstract class ChapterValidator extends BaseValidator
{
    protected function commonRules(): array
    {
        return [
            'title' => ['required', new Title()],
            'description' => [new Description()],
        ];
    }
}
