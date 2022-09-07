<?php

namespace Modules\Languages\Real\Controllers\Api;


use Illuminate\Http\Request;
use Modules\Languages\Real\Presenters\IndexRealLanguages;

class IndexRealLanguagesController
{
    public function __construct(
        private IndexRealLanguages $indexRealLanguages
    ) {}

    public function __invoke(Request $request)
    {
        return ($this->indexRealLanguages)($request->all());
    }
}
