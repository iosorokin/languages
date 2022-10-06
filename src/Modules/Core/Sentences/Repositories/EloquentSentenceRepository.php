<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Repositories;

use Modules\Core\Sentences\Entities\Sentence;
use Modules\Core\Sentences\Entities\SentenceModel;

final class EloquentSentenceRepository implements SentenceRepository
{
    public function save(Sentence $sentence): void
    {
        $sentence->save();
    }

    public function get(int $id): Sentence
    {
        return SentenceModel::find($id);
    }
}
