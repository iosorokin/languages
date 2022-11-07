<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Policies;

use Domain\Core\Sentences\Model\Sentence;
use Domain\Core\Sources\Structures\Source;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

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
