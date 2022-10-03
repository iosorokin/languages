<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Repositories;

use App\Extensions\Assert;
use Modules\Education\Sentences\Entities\Sentence;

final class EloquentSentenceRepository implements SentenceRepository
{
    public function save(Sentence $sentence): void
    {
        $sentence->save();
    }
}
