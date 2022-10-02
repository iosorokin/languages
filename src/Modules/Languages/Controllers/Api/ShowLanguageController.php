<?php

namespace Modules\Languages\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Languages\Presenters\Admin\AdminGetLanguagePresenter;

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
