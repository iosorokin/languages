<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Policies;

use Modules\Core\Sentences\Model\Sentence;
use Modules\Core\Sources\Structures\Source;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
