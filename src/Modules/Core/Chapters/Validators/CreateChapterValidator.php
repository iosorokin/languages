<?php

declare(strict_types=1);

namespace Modules\Core\Chapters\Validators;

use App\Rules\BigIntId;

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
