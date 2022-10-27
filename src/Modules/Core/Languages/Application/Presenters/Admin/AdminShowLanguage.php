<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Presenters\Admin;

use Modules\Core\Languages\Application\Authorization\LanguageAuthorizeAdmin;
use Modules\Core\Languages\Application\Presenters\Mixins\ShowLanguage;
use Modules\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Core\Languages\Presenters\Admin\AdminShowLanguagePresenter;
use Modules\Core\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

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
