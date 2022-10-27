<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Presenters;

use App\Extensions\Assert;
use Modules\Core\Languages\Application\Presenters\Mixins\CreateLanguage;
use Modules\Core\Languages\Application\Presenters\Mixins\UpdateLanguage;
use Modules\Core\Languages\Infrastructure\Model\Language;
use Modules\Personal\App\Presenters\Personal\Internal\GetUser;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

final class SeedLanguage
{
    public function __construct(
        private CreateLanguage $createLanguage,
        private UpdateLanguage $updateLanguage,
        private GetUser        $getUser
    ) {}

    public function create(EloquentUserModel|int $user, array $attributes): Language
    {
        $user = is_int($user) ? $this->getUser->get($user) : $user;
        Assert::true($user->roles->isAdmin());

        return ($this->createLanguage)($user, $attributes);
    }

    public function update(EloquentUserModel|int $user, Language|int $language, array $attributes): void
    {
        $user = is_int($user) ? $this->getUser->get($user) : $user;
        ($this->updateLanguage)($user, $language, $attributes);
    }
}
