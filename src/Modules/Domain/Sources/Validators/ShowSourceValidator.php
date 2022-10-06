<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Validators;

use App\Rules\BigIntId;
use Core\Extensions\BaseValidator;

final class ShowSourceValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'source_id' => ['required', new BigIntId()]
        ];
    }
}
