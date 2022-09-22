<?php

namespace Modules\Personal\Employers\Repositories;

use Modules\Personal\Employers\Structures\EmployerStructure;

interface EmployerRepository
{
    public function add(EmployerStructure $structure);

    public function getById(int $id): ?EmployerStructure;
}
