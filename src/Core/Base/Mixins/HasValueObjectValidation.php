<?php

declare(strict_types=1);

namespace Core\Base\Mixins;

use Core\Base\Model\Values\InvalidValueObject;
use Illuminate\Support\Str;

trait HasValueObjectValidation
{
    public function validate(): array
    {
        foreach ($this as $key => $value) {
            if ($value instanceof InvalidValueObject) {
                $errors[Str::snake($key)] = $value->errors();
            }
        }

        return $errors ?? [];
    }
}
