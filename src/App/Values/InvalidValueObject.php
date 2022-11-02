<?php

namespace App\Values;

interface InvalidValueObject
{
    public static function new(array $errors): static;

    public function errors(): array;
}
