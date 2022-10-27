<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Authorization;

use Modules\Domain\Languages\Model\Language;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

final class LanguageAuthorizeAdmin
{
    public function canCreate(EloquentUserModel $user): void
    {
        $this->abortIfNotRoot($user);
    }

    public function canShow(EloquentUserModel $user, Language $language): void
    {
        $this->abortIfNotAdmin($user);
    }

    public function canIndex(EloquentUserModel $user): void
    {
        $this->abortIfNotAdmin($user);
    }

    public function canUpdate(EloquentUserModel $user, Language $language): void
    {
        $this->abortIfNotRoot($user);
    }

    public function canDelete(EloquentUserModel $user, Language $language): void
    {
        $this->abortIfNotRoot($user);
    }

    private function abortIfNotAdmin(EloquentUserModel $user): void
    {
        if (! $user->roles->isAdmin()) {
            abort(403);
        }
    }

    private function abortIfNotRoot(EloquentUserModel $user): void
    {
        if (! $user->roles->isRoot()) {
            abort(403);
        }
    }
}
