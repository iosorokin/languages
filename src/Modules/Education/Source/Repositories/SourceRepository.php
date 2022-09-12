<?php

namespace Modules\Education\Source\Repositories;

use App\Contracts\Structures\Education\SourceStructure;

interface SourceRepository
{
    public function add(SourceStructure $source): void;
}
