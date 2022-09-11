<?php

namespace Modules\Languages\Real\Controllers\Api;

use App\Contracts\Presenters\Languages\Real\GetRealLanguagePresenter;
use Illuminate\Http\Request;

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
