<?php

namespace Modules\Personal\Employers\Repositories;

use App\Contracts\Structures\EmployerStructure;

interface EmployerRepository
{
    public function add(EmployerStructure $structure);

    public function getById(int $id): ?EmployerStructure;
}
