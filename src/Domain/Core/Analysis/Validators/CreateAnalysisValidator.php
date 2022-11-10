<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Validators;

use App\Support\Validation\Rules\BigIntId;

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
