<?php

namespace Core\Extensions;

interface Validator
{
    public function validate(array $attributes): array;
}
