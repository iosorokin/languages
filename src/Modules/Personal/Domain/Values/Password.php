<?php

declare(strict_types=1);

namespace Modules\Personal\Domain\Values;

use Illuminate\Support\Facades\Hash;

final class Password
{
    private readonly string $value;

    public function __construct(string $password)
    {
        $hash = Hash::info($password);
        if (is_null($hash['algo'])) {
            $this->value = Hash::make($password);
        } else {
            $this->value = $password;
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
