<?php

declare(strict_types=1);

namespace Domain\Analysis\Policies;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Sentences\Model\Sentence;

final class AnalysisPolicy
{
    public function canCreate(EloquentUserModel $user, Sentence $sentence): void
    {
        //
    }
}
