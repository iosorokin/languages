<?php

namespace App\Structures\Personal;

interface LearnerStructure
{
    public function setUser(UserStructure $user): self;

    public function getUser(): UserStructure;
}
