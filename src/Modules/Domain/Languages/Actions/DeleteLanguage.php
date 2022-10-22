<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Modules\Domain\Languages\Authorization\AuthorizeLanguage;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Personal\Auth\Contexts\Client;

final class DeleteLanguage
{
    public function __construct(
        private GetLanguagePresenter $getLanguage,
        private AuthorizeLanguage    $authorize,
        private LanguageFactory      $languageFactory,
    ) {}

    public function __invoke(Client $client, int $languageId): void
    {
        $language = $this->getLanguage->getOrThrowNotFound($languageId);
        // todo написать политику форс делита
        $this->authorize->canDelete($client, $language);
        $this->languageFactory
            ->repository()
            ->delete($language);
    }
}
