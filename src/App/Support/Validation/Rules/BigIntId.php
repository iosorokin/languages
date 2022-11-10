<?php

declare(strict_types=1);

namespace App\Support\Validation\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Lang;

final class BigIntId implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        if (! is_int($value) && ($value < 1)) {
            $fail(Lang::get('id'));
        }
    }
}
