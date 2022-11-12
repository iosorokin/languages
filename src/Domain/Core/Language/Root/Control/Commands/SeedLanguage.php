<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Commands;

use Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Infrastructure\Support\Assert;
use WIP\Personal\Account\Queries\GetUser;

final class SeedLanguage
{
    public function __construct(
        private CreateLanguageHandler $createLanguage,
        private UpdateLanguageHandler $updateLanguage,
        private GetUser               $getUser
    ) {}

    public function create(EloquentUserModel|int $user, array $attributes): LanguageModel
    {
        $user = is_int($user) ? $this->getUser->get($user) : $user;
        Assert::true($user->roles->isAdmin());

        return ($this->createLanguage)($user, $attributes);
    }

    public function update(EloquentUserModel|int $user, LanguageModel|int $language, array $attributes): void
    {
        $user = is_int($user) ? $this->getUser->get($user) : $user;
        ($this->updateLanguage)($user, $language, $attributes);
    }
}
