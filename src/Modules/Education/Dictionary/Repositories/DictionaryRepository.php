<?php

namespace Modules\Education\Dictionary\Repositories;

use Modules\Education\Dictionary\Structures\DictionaryStructure;

interface DictionaryRepository
{
    public function save(DictionaryStructure $dictionary): void;
}
