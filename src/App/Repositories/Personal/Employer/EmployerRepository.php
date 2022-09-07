<?php

namespace App\Repositories\Personal\Employer;

use App\Structures\Personal\EmployerStructure;

interface EmployerRepository
{
    public function add(EmployerStructure $structure);
}
