<?php

namespace App\Contracts;

interface Request extends Dto
{
    /**
     * @return array<array, array>
     */
    public static function new(): array;
}
