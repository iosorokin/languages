<?php

namespace Modules\Education\Words\Repositories;

use Modules\Education\Words\Structures\WordStructure;

interface WordRepository
{
    public function getOrCreate(WordStructure $word): WordStructure;

    public function getByWord(string $word): ?WordStructure;
}
