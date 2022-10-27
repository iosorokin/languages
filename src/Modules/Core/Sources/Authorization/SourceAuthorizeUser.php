<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Authorization;

use Modules\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Core\Sources\Structures\Source;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
