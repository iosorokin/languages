<?php

namespace Modules\Personal\Employers\Repositories;

use App\Contracts\Structures\Personal\EmployerStructure;

interface EmployerRepository
{
    public function add(EmployerStructure $structure);
}
