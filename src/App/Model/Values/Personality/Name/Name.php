<?php

namespace App\Model\Values\Personality\Name;

use App\Model\Values\ValueObject;

interface Name extends ValueObject
{
    public function get(): string;

    public function compare(Name $name): bool;

    public function __toString(): string;
}
