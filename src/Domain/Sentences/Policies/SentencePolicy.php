<?php

declare(strict_types=1);

namespace Domain\Sentences\Policies;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Sentences\Model\Sentence;
use Domain\Sources\Structures\Source;

final class SentencePolicy
{
    public function canCreate(EloquentUserModel $user, Source $source): void
    {

    }

    public function canDelete(EloquentUserModel $user, Sentence $sentence): void
    {
        if ($user->id !== $sentence->user_id) {
            abort(403);
        }
    }
}
