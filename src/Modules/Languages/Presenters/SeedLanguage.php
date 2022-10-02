<?php

declare(strict_types=1);

namespace Modules\Languages\Presenters;

use App\Extensions\Assert;
use Modules\Languages\Actions\CreateLanguage;
use Modules\Personal\Auth\Tests\AuthHelper;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Repositories\UserRepository;

final class SeedLanguage
{
    public function __construct(
        private CreateLanguage $createLanguage,
        private UserRepository $userRepository,
    ) {}

    public function __invoke(User|int $user, array $attributes)
    {
        $user = is_int($user) ? $this->userRepository->get($user) : $user;
        $client = AuthHelper::new()->createClientContext($user);
        Assert::true($client->isAdmin());

        return ($this->createLanguage)($user, $attributes);
    }
}
