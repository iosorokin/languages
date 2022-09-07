<?php

namespace Modules\Languages\Real\Controllers\Api;

use Core\Http\Responses\NoContentResponse;
use Illuminate\Http\Request;
use Modules\Languages\Real\Presenters\CreateRealLanguage;

class CreateRealLanguageController
{
    public function __construct(
        private CreateRealLanguage $newRealLanguage,
    ) {}

    public function __invoke(Request $request)
    {
        $language = ($this->newRealLanguage)($request->all());

        return new NoContentResponse();
    }
}
