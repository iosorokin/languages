<?php

namespace Domain\Core\Source\Base\Repository;

use App\Controll\Source\Student\FindSourceImp;
use Domain\Core\Source\Base\Model\Aggregate\Source;
use Domain\Core\Source\Base\Repository\Structure\SourceStructure;

interface SourceRepository
{
    public function add(Source $source): int;

    public function find(FindSourceImp $query): SourceStructure;
}
