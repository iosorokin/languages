<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Policies;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Sentences\Model\Sentence;
use WIP\Core\Sources\Structures\Source;

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
