<?php

namespace Modules\Personal\Learner\Structures;

use Modules\Personal\Auth\Structures\BaseAuthStructure;
use Modules\Personal\User\Structures\UserStructure;

/**
 * @property int $id
 * @property int $user_id
 */
interface LearnerStructure
{
    public function setUser(UserStructure $user): static;

    public function getUser(): UserStructure;

    public function getBaseAuth(): BaseAuthStructure;
}
