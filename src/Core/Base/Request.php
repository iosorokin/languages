<?php

namespace Core\Base;

interface Request extends Dto
{
    /**
     * @return array<array, array>
     */
    public static function new(): array;
}
