<?php

namespace Modules\Education\Source\Repositories;

use App\Contracts\Structures\SourceStructure;

interface SourceRepository
{
    public function add(SourceStructure $source): void;
}
