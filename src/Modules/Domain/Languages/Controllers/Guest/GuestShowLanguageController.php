<?php

namespace Modules\Domain\Languages\Controllers\Guest;

use Core\Extensions\Request;
use Modules\Domain\Languages\Presenters\Guest\GuestShowLanguagePresenter;

class GuestShowLanguageController
{
    public function __construct(
        private GuestShowLanguagePresenter $showLanguage,
    ) {}

    public function __invoke(Request $request)
    {
        return ($this->showLanguage)($request->all()['language_id']);
    }
}
