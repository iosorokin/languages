<?php

namespace App\Contracts\Structures;

/**
 * @property int $id
 */
interface AuthableStructure
{
    public function getBaseAuth(): BaseAuthStructure;


}
