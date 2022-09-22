<?php

namespace Modules\Education\Dictionaries\Repositories;

use Modules\Education\Dictionaries\Structures\DictionaryStructure;

interface DictionaryRepository
{
    public function save(DictionaryStructure $dictionary): void;
}
