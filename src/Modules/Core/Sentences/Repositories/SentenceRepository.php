<?php

namespace Modules\Core\Sentences\Repositories;

use Modules\Core\Sentences\Entities\Sentence;

interface SentenceRepository
{
    public function save(Sentence $sentence): void;

    public function get(int $id): Sentence;
}
