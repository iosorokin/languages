<?php

namespace App\Controllers\Api\Languages\ReaL;

use App\Presenters\Languages\Real\NewRealLanguage;
use Core\Http\Responses\NoContentResponse;
use Illuminate\Http\Request;

class CreateRealLanguageController
{
    public function __construct(
        private NewRealLanguage $newRealLanguage,
    ) {}

    public function __invoke(Request $request)
    {
        $language = ($this->newRealLanguage)($request->all());

        return new NoContentResponse();
    }
}
