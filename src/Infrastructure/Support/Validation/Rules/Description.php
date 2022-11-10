<?php

declare(strict_types=1);

namespace Infrastructure\Support\Validation\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

final class Description implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        // TODO: Implement __invoke() method.
    }
}
