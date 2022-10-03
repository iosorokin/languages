<?php

namespace Modules\Education\Dictionary\Repositories;

use Modules\Education\Dictionary\Entity\Dictionary;

interface DictionaryRepository
{
    public function save(Dictionary $dictionary): void;
}
