<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Presenters\Admin;

use Domain\Languages\Application\Authorization\LanguageAuthorizeAdmin;
use Domain\Languages\Application\Presenters\Mixins\ShowLanguage;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Domain\Languages\Presenters\Admin\AdminShowLanguagePresenter;
use Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Domain\Personal\Auth\Presenters\GetClientPresenter;

class AdminShowLanguage implements AdminShowLanguagePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private GetLanguagePresenter $getLanguage,
        private LanguageAuthorizeAdmin $authorize,
        private ShowLanguage $showLanguage,
    ) {}

    public function __invoke(int $id): LanguageModel
    {
        $client = ($this->getClient)();
        $language = $this->getLanguage->getOrThrowNotFound($id);
        $this->authorize->canShow($client, $language);
        $language = ($this->showLanguage)($language);

        return $language;
    }
}
