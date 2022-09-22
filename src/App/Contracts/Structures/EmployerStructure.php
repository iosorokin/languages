<?php

namespace App\Contracts\Structures;

use Modules\Position\Values\Positions;

/**
 * @property int $id
 * @property Positions $position
 */
interface EmployerStructure
{
    public function setUser(UserStructure $user): static;

    public function getUser(): UserStructure;

    public function getBaseAuth(): BaseAuthStructure;
}
