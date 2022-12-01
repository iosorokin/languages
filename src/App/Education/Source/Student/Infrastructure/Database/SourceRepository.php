<?php

namespace App\Education\Source\Student\Infrastructure\Database;

use App\Education\Source\Shared\Infrastructure\Query\FindSource;
use App\Education\Source\Student\Infrastructure\Database\Structure\SourceStructure;
use Core\Base\Model\Values\Identificatiors\Id\IntId;

interface SourceRepository
{
    public function generateId(): IntId;

    public function add(SourceStructure $source): int;

    public function find(FindSource $query): SourceStructure;
}
