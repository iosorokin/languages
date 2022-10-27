<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Authorization;

use Modules\Core\Languages\Infrastructure\Model\Language;
use Modules\Core\Sources\Structures\Source;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

final class SourceAuthorizeUser
{
    public function canCreate(EloquentUserModel $user, Language $language): void
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
