<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Repositories;

use App\Extensions\Assert;
use Modules\Education\Sentences\Structures\SentenceStructure;

final class EloquentSentenceRepository implements SentenceRepository
{
    public function save(SentenceStructure $sentence): void
    {
        $sentence->save();
    }
}
