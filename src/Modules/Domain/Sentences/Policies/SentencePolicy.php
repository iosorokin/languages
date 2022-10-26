<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Policies;

use App\Database\Personal\EloquentUserModel;
use Modules\Domain\Sentences\Model\Sentence;
use Modules\Domain\Sources\Structures\Source;

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
