<?php

namespace Modules\Education\Dictionaries\Repositories;

use App\Contracts\Structures\DictionaryStructure;

interface DictionaryRepository
{
    public function save(DictionaryStructure $dictionary): void;
}
