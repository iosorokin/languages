<?php

namespace Domain\Personal\Values\Personality\Name;

interface Name
{
    public function get(): string;

    public function compare(Name $name): bool;

    public function __toString(): string;
}
