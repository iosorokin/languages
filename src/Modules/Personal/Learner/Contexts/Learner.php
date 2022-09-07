<?php

namespace Modules\Personal\Learner\Contexts;

use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\BaseAuthStructure;
use App\Contracts\Structures\Personal\LearnerStructure;
use Modules\Personal\User\Contexts\User;

class Learner
{
    private User $user;

    public function __construct(
        public readonly LearnerStructure&AuthableStructure $structure
    ) {}

    public function getUser(): User
    {
        return $this->user;
    }

    public function getBaseAuth(): BaseAuthStructure
    {
        return $this->structure->getBaseAuth();
    }
}
