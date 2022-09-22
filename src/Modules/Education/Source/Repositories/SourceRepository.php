<?php

namespace Modules\Education\Source\Repositories;

use Modules\Education\Source\Structures\SourceStructure;

interface SourceRepository
{
    public function add(SourceStructure $source): void;
}
