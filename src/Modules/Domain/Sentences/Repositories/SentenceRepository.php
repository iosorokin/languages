<?php

namespace Modules\Domain\Sentences\Repositories;

use Modules\Domain\Sentences\Structures\Sentence;

interface SentenceRepository
{
    public function save(Sentence $sentence): void;

    public function get(int $id): ?Sentence;

    public function delete(Sentence $sentence): void;
}
