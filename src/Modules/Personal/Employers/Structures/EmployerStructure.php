<?php

namespace Modules\Personal\Employers\Structures;

use Modules\Personal\Auth\Structures\BaseAuthStructure;
use Modules\Personal\User\Structures\UserStructure;
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
