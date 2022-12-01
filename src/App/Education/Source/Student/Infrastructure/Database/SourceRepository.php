<?php

namespace App\Education\Source\Student\Infrastructure\Database;

use App\Controll\Source\Student\FindSourceImp;
use App\Education\Source\Student\Infrastructure\Database\Structure\WriteSourceStructure;
use Core\Base\Model\Values\Identificatiors\Id\IntId;

interface SourceRepository
{
    public function generateId(): IntId;

    public function add(WriteSourceStructure $source): int;

    public function find(FindSourceImp $query): SourceStructure;
}
