<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Validators;

use Infrastructure\Support\Validation\Rules\BigIntId;

final class CreateAnalysisValidator extends AnalysisValidator
{
    protected function rules(): array
    {
        $rules = [
            'user_id' => ['required', new BigIntId()],
            'sentence_id' => ['required', new BigIntId()]
        ];

        return $this->commonRules() + $rules;
    }
}
