<?php

declare(strict_types=1);

namespace Domain\Core\Chapters\Validators;

use Infrastructure\Support\Validation\BaseValidator;
use Infrastructure\Support\Validation\Rules\BigIntId;

final class ShowChapterValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'chapter_id' => ['required', new BigIntId()],
        ];
    }
}
