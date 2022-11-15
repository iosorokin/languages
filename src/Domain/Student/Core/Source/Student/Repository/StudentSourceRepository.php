<?php

namespace Domain\Student\Core\Source\Student\Repository;

use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Student\Core\Source\Student\Model\Aggregate\StudentSource;

interface StudentSourceRepository
{
    public function add(StudentSource $source): IntId;
}
