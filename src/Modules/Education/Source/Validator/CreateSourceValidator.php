<?php

declare(strict_types=1);

namespace Modules\Education\Source\Validator;

use App\Rules\BigIntId;

final class CreateSourceValidator extends SourceValidator
{
    protected function rules(): array
    {
        $rules = [
            'language_id' => ['required', new BigIntId()]
        ];

        return $rules + $this->defaultRules();
    }
}
