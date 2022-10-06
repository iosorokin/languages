<?php

namespace Modules\Domain\Languages\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\Admin\AdminGetLanguagePresenter;

class ShowLanguageController
{
    public function __construct(
        private AdminGetLanguagePresenter $showRealLanguage,
    ) {}

    public function __invoke(Request $request)
    {
        return ($this->showRealLanguage)($request->id);
    }
}
