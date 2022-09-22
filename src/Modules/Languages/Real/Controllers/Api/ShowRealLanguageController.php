<?php

namespace Modules\Languages\Real\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Languages\Real\Presenters\GetRealLanguagePresenter;

class ShowRealLanguageController
{
    public function __construct(
        private GetRealLanguagePresenter $showRealLanguage,
    ) {}

    public function __invoke(Request $request)
    {
        return ($this->showRealLanguage)($request->id);
    }
}
