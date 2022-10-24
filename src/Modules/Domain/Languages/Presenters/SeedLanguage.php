<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters;

use App\Extensions\Assert;
use Modules\Domain\Languages\Presenters\Mixins\CreateLanguage;
use Modules\Domain\Languages\Presenters\Mixins\UpdateLanguage;
use Modules\Domain\Languages\Model\Language;
use Modules\Personal\User\Model\User;
use Modules\Personal\User\Presenters\Internal\GetUser;

final class SeedLanguage
{
    public function __construct(
        private CreateLanguage $createLanguage,
        private UpdateLanguage $updateLanguage,
        private GetUser        $getUser
    ) {}

    public function create(User|int $user, array $attributes): Language
    {
        $user = is_int($user) ? $this->getUser->get($user) : $user;
        Assert::true($user->roles->isAdmin());

        return ($this->createLanguage)($user, $attributes);
    }

    public function update(User|int $user, Language|int $language, array $attributes): void
    {
        $user = is_int($user) ? $this->getUser->get($user) : $user;
        ($this->updateLanguage)($user, $language, $attributes);
    }
}
