<?php

declare(strict_types=1);

namespace Core\Extensions;

use Illuminate\Support\Facades\Validator;

abstract class BaseValidator
{
    /**
     * @param array<mixed> $attributes
     */
    public function validate(array $attributes): array
    {
        $validator = Validator::make(
            $attributes,
            $this->rules()
        );

        return $validator->validate();
    }

    /**
     * @return array<mixed>
     */
    protected abstract function rules(): array;
}
