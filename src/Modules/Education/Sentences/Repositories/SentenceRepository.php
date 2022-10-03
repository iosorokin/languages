<?php

namespace Modules\Education\Sentences\Repositories;

use Modules\Education\Sentences\Entities\Sentence;

interface SentenceRepository
{
    public function save(Sentence $sentence): void;
}
