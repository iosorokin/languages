<?php

namespace Domain\Education\Source\Student\Infrastructure\Database;

use Domain\Education\Source\Student\Infrastructure\Database\Structure\SourceStructure;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Core\Infrastructure\Query\FindSource;

interface SourceRepository
{
    public function generateId(): IntId;

    public function add(SourceStructure $source): int;

    public function find(FindSource $query): SourceStructure;
}
