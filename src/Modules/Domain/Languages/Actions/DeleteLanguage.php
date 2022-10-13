<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Personal\Auth\Contexts\Client;

final class DeleteLanguage
{
    public function __construct(
        private GetLanguagePresenter $getLanguage,
        private LanguagePolicy $policy,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(Client $client, int $languageId): void
    {
        $language = $this->getLanguage->getOrThrowNotFound($languageId);
        $this->policy->canDelete($client, $language);

    }
}
