<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Actions\CreateSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Structures\User;
use Modules\Personal\User\Repositories\UserRepository;

final class SeedSource
{
    public function __construct(
        private GetClientPresenter $getClient,
        private CreateSource $createSource,
        private UserRepository $userRepository,
    ) {}

    public function __invoke(User|int $user, Language|int $language, array $attributes): Source
    {
        $user = is_int($user) ? $this->userRepository->get($user): $user;
        $language = is_int($language) ? $language : $language->getId();
        $client = ($this->getClient)($user);
        $source = ($this->createSource)($client, $language, $attributes);

        return $source;
    }
}
