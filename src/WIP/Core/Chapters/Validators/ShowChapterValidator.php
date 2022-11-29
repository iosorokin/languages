<?php

declare(strict_types=1);

namespace WIP\Core\Chapters\Validators;

use Core\Infrastructure\Support\Validation\BaseValidator;
use Core\Infrastructure\Support\Validation\Rules\BigIntId;

final class ShowChapterValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'chapter_id' => ['required', new BigIntId()],
        ];
    }
}
