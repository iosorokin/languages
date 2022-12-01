<?php

namespace Core\Base;

use Core\Base\Dto\Dto;

interface Request extends Dto
{
    /**
     * @return array<array, array>
     */
    public static function new(): array;
}
