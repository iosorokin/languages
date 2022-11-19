<?php

namespace App\Base\Model\Values;

interface InvalidValueObject
{
    public static function new(array $errors): static;

    public function errors(): array;
}
