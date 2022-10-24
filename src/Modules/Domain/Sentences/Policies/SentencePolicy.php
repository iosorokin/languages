<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Policies;

use Modules\Domain\Sentences\Model\Sentence;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\User\Model\User;

final class SentencePolicy
{
    public function canCreate(User $user, Source $source): void
    {

    }

    public function canDelete(User $user, Sentence $sentence): void
    {
        if ($user->id !== $sentence->user_id) {
            abort(403);
        }
    }
}
