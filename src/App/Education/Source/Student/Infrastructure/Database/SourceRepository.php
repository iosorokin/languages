<?php

namespace App\Education\Source\Student\Infrastructure\Database;

use App\Controll\Source\Student\FindSourceImp;
use App\Education\Source\Student\Infrastructure\Database\Structure\WriteSourceStructure;

interface SourceRepository
{
    public function add(WriteSourceStructure $source): int;

    public function find(FindSourceImp $query): SourceStructure;
}
