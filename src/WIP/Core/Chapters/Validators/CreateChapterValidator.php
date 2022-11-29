<?php

declare(strict_types=1);

namespace WIP\Core\Chapters\Validators;

use Core\Infrastructure\Support\Validation\Rules\BigIntId;

final class CreateChapterValidator extends ChapterValidator
{
    public function rules(): array
    {
        $rules = [
            'source_id' => ['required', new BigIntId()]
        ];

        return $rules + $this->commonAttributesRules();
    }
}
