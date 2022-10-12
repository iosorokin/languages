<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Policies;

use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelSourcePolicy implements SourcePolicy
{
    public function __construct(
        private LanguagePolicy $languagePolicy,
    ) {}

    public function canCreate(Client $client, Language $language): void
    {
        if (! $client->isMember()) {
            abort(403);
        }

        $this->languagePolicy->canTakeToLearn($client, $language);
    }

    public function canShow(Client $client, Source $source): void
    {

    }

    public function canTakeToWork(Client $client, Source $source): void
    {
        $isClientOwner = $client->id() === $source->getUserId();
        if ($isClientOwner) return;
        $owner = $source->getUser();
        $permission = $owner->getPermission();
        abort_if($permission->isAdmin(), 403);
    }
}
