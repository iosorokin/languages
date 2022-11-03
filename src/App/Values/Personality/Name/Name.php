<?php

namespace App\Values\Personality\Name;

use App\Values\ValueObject;

interface Name extends ValueObject
{
    public function get(): string;

    public function compare(Name $name): bool;

    public function __toString(): string;
}
