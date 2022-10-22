<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Actions\CreateLanguage;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Authorization\AuthorizeLanguage;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminCreateLanguage implements AdminCreateLanguagePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private AuthorizeLanguage  $authorize,
        private CreateLanguage     $createLanguage,
    ) {}

    public function __invoke(array $attributes): Language
    {
        $client = ($this->getClient)();
        $this->authorize->canCreate($client);
        $language = ($this->createLanguage)($client->user(), $attributes);

        return $language;
    }
}
