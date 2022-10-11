<?php

declare(strict_types=1);

namespace Core\Validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class BaseValidator
{
    /**
     * @param array<mixed> $attributes
     * @throws ValidationException
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
