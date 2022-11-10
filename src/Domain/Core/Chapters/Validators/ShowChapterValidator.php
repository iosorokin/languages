<?php

declare(strict_types=1);

namespace Domain\Core\Chapters\Validators;

use App\Base\Validation\BaseValidator;
use App\Support\Validation\Rules\BigIntId;

final class ShowChapterValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'chapter_id' => ['required', new BigIntId()],
        ];
    }
}
