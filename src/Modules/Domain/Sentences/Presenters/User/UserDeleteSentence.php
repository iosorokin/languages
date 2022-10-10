<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Presenters\User;

use Modules\Domain\Sentences\Policies\SentencePolicy;
use Modules\Domain\Sentences\Repositories\SentenceRepository;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserDeleteSentence implements UserDeleteSentencePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private SentencePolicy $policy,
    ) {}

    public function __invoke(int $id): void
    {
        $client = ($this->getClient)();
        $sentence = $
        $this->policy->canDelete($client);
    }
}
