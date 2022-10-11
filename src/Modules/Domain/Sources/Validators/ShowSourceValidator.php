<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Validators;

use App\Rules\BigIntId;
use Core\Validation\BaseValidator;

final class ShowSourceValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'source_id' => ['required', new BigIntId()]
        ];
    }
}
