<?php

declare(strict_types=1);

namespace Domain\Core\Chapters\Validators;

use Infrastructure\Support\Validation\Rules\BigIntId;

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
