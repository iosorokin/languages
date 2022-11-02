<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Presenters;

use App\Extensions\Assert;
use Domain\Personal\Actions\Common\GetUser;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Languages\Application\Presenters\Mixins\CreateLanguage;
use Domain\Languages\Application\Presenters\Mixins\UpdateLanguage;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class SeedLanguage
{
    public function __construct(
        private CreateLanguage $createLanguage,
        private UpdateLanguage $updateLanguage,
        private GetUser        $getUser
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
