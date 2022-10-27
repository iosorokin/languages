<?php

declare(strict_types=1);

namespace Modules\Core\Analysis\Validators;

use App\Rules\BigIntId;

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