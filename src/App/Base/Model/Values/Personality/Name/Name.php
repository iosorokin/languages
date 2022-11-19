<?php

namespace App\Base\Model\Values\Personality\Name;

use App\Base\Model\Values\ValueObject;

interface Name extends ValueObject
{
    public function get(): string;

    public function compare(Name $name): bool;

    public function __toString(): string;
}
