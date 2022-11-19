<?php

namespace Domain\Core\Source\Student\Repository;

use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Source\Student\Controll\Query\StudentFindSource;
use Domain\Core\Source\Student\Model\Aggregate\StudentSource;
use Domain\Core\Source\Student\Model\Entity\StudentSourceLanguage;

interface StudentSourceRepository
{
    public function add(StudentSource $source): BigIntId;

    public function find(StudentFindSource $query): StudentSourceLanguage;
}
