<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Authorization;

use Domain\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class LanguageAuthorizeAdmin
{
    public function canCreate(EloquentUserModel $user): void
    {
        $this->abortIfNotRoot($user);
    }

    public function canShow(EloquentUserModel $user, LanguageModel $language): void
    {
        $this->abortIfNotAdmin($user);
    }

    public function canIndex(EloquentUserModel $user): void
    {
        $this->abortIfNotAdmin($user);
    }

    public function canUpdate(EloquentUserModel $user, LanguageModel $language): void
    {
        $this->abortIfNotRoot($user);
    }

    public function canDelete(EloquentUserModel $user, LanguageModel $language): void
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
