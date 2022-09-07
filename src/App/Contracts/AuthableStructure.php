<?php

namespace App\Contracts;

use App\Structures\Personal\BaseAuthStructure;

/**
 * @property int $id
 */
interface AuthableStructure
{
    public function getBaseAuth(): BaseAuthStructure;

    public function setBaseAuth(BaseAuthStructure $structure): static;
}
