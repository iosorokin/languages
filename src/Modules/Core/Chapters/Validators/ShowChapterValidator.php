<?php

declare(strict_types=1);

namespace Modules\Core\Chapters\Validators;

use App\Rules\BigIntId;
use Core\Base\Validation\BaseValidator;

final class ShowChapterValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'chapter_id' => ['required', new BigIntId()],
        ];
    }
}
