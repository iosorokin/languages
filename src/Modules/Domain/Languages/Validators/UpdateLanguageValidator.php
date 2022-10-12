<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Validators;

use App\Rules\BigIntId;

final class UpdateLanguageValidator extends LanguageValidator
{
    protected function rules(): array
    {
        $rules = [
            'user_id' => [new BigIntId()],
            'is_active' => ['bool']
        ];

        return array_merge_recursive($this->commonRules(), $rules);
    }
}
