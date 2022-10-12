<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Actions\CreateLanguage;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminCreateLanguage implements AdminCreateLanguagePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private LanguagePolicy     $policy,
        private CreateLanguage     $createLanguage,
    ) {}

    public function __invoke(array $attributes): Language
    {
        $client = ($this->getClient)();
        $this->policy->canCreate($client);
        $language = ($this->createLanguage)($client->user(), $attributes);

        return $language;
    }
}
