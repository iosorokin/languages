<?php

declare(strict_types=1);

namespace Modules\Core\Analysis\Policies;

use Modules\Core\Sentences\Model\Sentence;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

final class AnalysisPolicy
{
    public function canCreate(EloquentUserModel $user, Sentence $sentence): void
    {
        //
    }
}
