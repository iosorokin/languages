<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Authorization\LanguageAuthorizeAdmin;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Presenters\Mixins\ShowLanguage;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

class AdminShowLanguage implements AdminShowLanguagePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private GetLanguagePresenter $getLanguage,
        private LanguageAuthorizeAdmin $authorize,
        private ShowLanguage $showLanguage,
    ) {}

    public function __invoke(int $id): Language
    {
        $client = ($this->getClient)();
        $language = $this->getLanguage->getOrThrowNotFound($id);
        $this->authorize->canShow($client, $language);
        $language = ($this->showLanguage)($language);

        return $language;
    }
}
