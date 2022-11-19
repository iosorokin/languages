<?php

namespace Domain\Core\Source\Base\Repository;

use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Source\Base\Controll\Query\StudentFindSource;
use Domain\Core\Source\Base\Model\Aggregate\StudentSource;
use Domain\Core\Source\Base\Model\Entity\StudentSourceLanguage;

interface StudentSourceRepository
{
    public function add(StudentSource $source): BigIntId;

    public function find(StudentFindSource $query): StudentSourceLanguage;
}
