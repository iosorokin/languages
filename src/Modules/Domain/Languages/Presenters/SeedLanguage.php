<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters;

use App\Extensions\Assert;
use Modules\Domain\Languages\Presenters\Mixins\CreateLanguage;
use Modules\Domain\Languages\Presenters\Mixins\UpdateLanguage;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Tests\AuthHelper;
use Modules\Personal\User\Repositories\UserRepository;
use Modules\Personal\User\Structures\User;

final class SeedLanguage
{
    public function __construct(
        private CreateLanguage $createLanguage,
        private UpdateLanguage $updateLanguage,
        private UserRepository $userRepository,
    ) {}

    public function create(User|int $user, array $attributes): Language
    {
        $user = is_int($user) ? $this->userRepository->get($user) : $user;
        $client = AuthHelper::new()->createClientContext($user);
        Assert::true($client->isAdmin());

        return ($this->createLanguage)($user, $attributes);
    }

    public function update(User|int $user, Language|int $language, array $attributes): void
    {
        $user = is_int($user) ? $this->userRepository->get($user) : $user;
        $client = AuthHelper::new()->createClientContext($user);
        ($this->updateLanguage)($client, $language, $attributes);
    }
}
