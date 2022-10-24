<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Authorization;

use Modules\Domain\Languages\Model\Language;
use Modules\Personal\User\Model\User;

final class LanguageAuthorizeAdmin
{
    public function canCreate(User $user): void
    {
        $this->abortIfNotRoot($user);
    }

    public function canShow(User $user, Language $language): void
    {
        $this->abortIfNotAdmin($user);
    }

    public function canIndex(User $user): void
    {
        $this->abortIfNotAdmin($user);
    }

    public function canUpdate(User $user, Language $language): void
    {
        $this->abortIfNotRoot($user);
    }

    public function canDelete(User $user, Language $language): void
    {
        $this->abortIfNotRoot($user);
    }

    private function abortIfNotAdmin(User $user): void
    {
        if (! $user->roles->isAdmin()) {
            abort(403);
        }
    }

    private function abortIfNotRoot(User $user): void
    {
        if (! $user->roles->isRoot()) {
            abort(403);
        }
    }
}
