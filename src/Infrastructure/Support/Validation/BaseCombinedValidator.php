<?php

declare(strict_types=1);

namespace Infrastructure\Support\Validation;

use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Infrastructure\Support\Assert;

abstract class BaseCombinedValidator
{
    protected Collection $validators;

    public function __construct()
    {
        $this->validators = new Collection();
    }

    /**
     * @return array<BaseValidator>
     */
    abstract protected function validators(): array;

    public function add(string|BaseValidator|array $validator): static
    {
        if (is_string($validator)) {
            $this->validators->push(app()->make($validator));
        } elseif (is_array($validator)) {
            $this->validators->merge($validator);
        } else {
            $this->validators->push($validator);
        }

        return $this;
    }

    public function validate(array $attributes): array
    {
        $validated = [];
        $errors = [];

        $validators = $this->validators->merge($this->validators());
        foreach ($validators as $validator) {
            if (is_string($validator)) {
                $validator = app()->make($validator);
            }
            Assert::isInstanceOf($validator, BaseValidator::class);
            /** @var BaseValidator $validator */

            try {
                $validated += $validator->validate($attributes);
            } catch (ValidationException $e) {
                $errors += $e->errors();
            }
        }

        if (! empty($errors)) {
            throw ValidationException::withMessages($errors);
        }

        return $validated;
    }
}
