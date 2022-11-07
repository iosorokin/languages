<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Policies;

use Domain\Core\Sentences\Model\Sentence;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class AnalysisPolicy
{
    public function canCreate(EloquentUserModel $user, Sentence $sentence): void
    {
        //
    }
}
