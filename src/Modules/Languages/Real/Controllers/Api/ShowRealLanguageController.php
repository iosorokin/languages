<?php

namespace Modules\Languages\Real\Controllers\Api;

use App\Contracts\Presenters\Languages\Real\ShowRealLanguagePresenter;
use Illuminate\Http\Request;

class ShowRealLanguageController
{
    public function __construct(
        private ShowRealLanguagePresenter $showRealLanguage,
    ) {}

    public function __invoke(Request $request)
    {
        return ($this->showRealLanguage)($request->id);
    }
}
