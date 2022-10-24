<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Authorization;

use Modules\Domain\Languages\Model\Language;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\User\Model\User;

final class SourceAuthorizeUser
{
    public function canCreate(User $user, Language $language): void
    {
        abort_if(! $user->roles->isUser(), 403);
    }

    public function canUpdate(User $user, Source $source): void
    {
        $this->isNotOwner($user, $source);
    }

    public function canDelete(User $user, Source $source): void
    {
        $this->isNotOwner($user, $source);
    }

    private function isNotOwner(User $user, Source $source)
    {
        abort_if($user->id() !== $source->getUserId(), 403);
    }
}
