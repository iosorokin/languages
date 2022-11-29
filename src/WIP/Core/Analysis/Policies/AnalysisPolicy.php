<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Policies;

use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Sentences\Model\Sentence;

final class AnalysisPolicy
{
    public function canCreate(EloquentUserModel $user, Sentence $sentence): void
    {
        //
    }
}
