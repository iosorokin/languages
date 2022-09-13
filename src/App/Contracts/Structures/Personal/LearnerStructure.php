<?php

namespace App\Contracts\Structures\Personal;

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
