<?php

declare(strict_types=1);

namespace Domain\Sources\Authorization;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Domain\Sources\Structures\Source;

final class SourceAuthorizeUser
{
    public function canCreate(EloquentUserModel $user, LanguageModel $language): void
    {
        abort_if(! $user->roles->isUser(), 403);
    }

    public function canUpdate(EloquentUserModel $user, Source $source): void
    {
        $this->isNotOwner($user, $source);
    }

    public function canDelete(EloquentUserModel $user, Source $source): void
    {
        $this->isNotOwner($user, $source);
    }

    private function isNotOwner(EloquentUserModel $user, Source $source)
    {
        abort_if($user->id() !== $source->getUserId(), 403);
    }
}
