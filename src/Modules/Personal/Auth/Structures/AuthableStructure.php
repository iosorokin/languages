<?php

namespace Modules\Personal\Auth\Structures;

/**
 * @property int $id
 */
interface AuthableStructure
{
    public function getBaseAuth(): BaseAuthStructure;


}
