<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Repositories;

use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sentences\Entities\SentenceModel;

final class EloquentSentenceRepository implements SentenceRepository
{
    public function save(Sentence $sentence): void
    {
        $sentence->save();
    }

    public function get(int $id): ?Sentence
    {
        return SentenceModel::find($id);
    }

    public function delete(Sentence $sentence): void
    {
        $sentence->delete();
    }
}
