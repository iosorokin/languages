<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Policies;

use Modules\Domain\Sentences\Model\Sentence;
use Modules\Personal\User\Model\User;

final class AnalysisPolicy
{
    public function canCreate(User $user, Sentence $sentence): void
    {
        //
    }
}
