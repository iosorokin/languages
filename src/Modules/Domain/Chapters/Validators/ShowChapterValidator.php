<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Validators;

use App\Rules\BigIntId;
use Core\Extensions\BaseValidator;

final class ShowChapterValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'chapter_id' => ['required', new BigIntId()],
        ];
    }
}
