<?php

namespace App\Contracts\Structures\Personal;

interface LearnerStructure
{
    public function setUser(UserStructure $user): self;

    public function getUser(): UserStructure;
}
