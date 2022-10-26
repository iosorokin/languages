<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Policies;

use App\Database\Personal\EloquentUserModel;
use Modules\Domain\Sentences\Model\Sentence;

final class AnalysisPolicy
{
    public function canCreate(EloquentUserModel $user, Sentence $sentence): void
    {
        //
    }
}
