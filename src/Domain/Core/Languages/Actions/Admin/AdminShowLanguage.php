<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Actions\Admin;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Account\Auth\Presenters\GetClientPresenter;
use Domain\Core\Languages\Authorization\LanguageAuthorizeAdmin;
use Domain\Core\Languages\Actions\Mixins\ShowLanguage;
use Domain\Languages\Presenters\Admin\AdminShowLanguagePresenter;
use Domain\Languages\Presenters\Internal\GetLanguagePresenter;

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
