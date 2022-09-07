<?php

namespace App\Contracts\Structures;

use App\Contracts\Structures\Personal\BaseAuthStructure;

/**
 * @property int $id
 */
interface AuthableStructure
{
    public function getBaseAuth(): BaseAuthStructure;

    public function setBaseAuth(BaseAuthStructure $structure): static;
}
