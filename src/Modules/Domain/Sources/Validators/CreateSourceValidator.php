<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Validators;

use App\Rules\BigIntId;

final class CreateSourceValidator extends SourceValidator
{
    protected function rules(): array
    {
        return $this->defaultRules();
    }
}
