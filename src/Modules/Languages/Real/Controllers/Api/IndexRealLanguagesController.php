<?php

namespace Modules\Languages\Real\Controllers\Api;


use Illuminate\Http\Request;
use Modules\Languages\Real\Presenters\GetRealLanguages;

class IndexRealLanguagesController
{
    public function __construct(
        private GetRealLanguages $indexRealLanguages
    ) {}

    public function __invoke(Request $request)
    {
        return ($this->indexRealLanguages)($request->all());
    }
}
