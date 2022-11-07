<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Presenters\Admin;

use Domain\Core\Languages\Application\Authorization\LanguageAuthorizeAdmin;
use Domain\Core\Languages\Application\Presenters\Mixins\ShowLanguage;
use Domain\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Domain\Languages\Presenters\Admin\AdminShowLanguagePresenter;
use Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Domain\Account\Auth\Presenters\GetClientPresenter;

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
