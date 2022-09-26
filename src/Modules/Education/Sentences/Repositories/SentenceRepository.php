<?php

namespace Modules\Education\Sentences\Repositories;

use Modules\Education\Sentences\Structures\SentenceStructure;

interface SentenceRepository
{
    public function save(SentenceStructure $sentence): void;
}
