<?php

namespace Modules\Languages\Real\View\Api;


use Illuminate\Http\Request;
use Modules\Languages\Real\Presenters\IndexRealLanguages;

class IndexRealLanguagesController
{
    public function __construct(
        private IndexRealLanguages $getRealLanguages
    ) {}

    public function __invoke(Request $request)
    {
        $collection = ($this->getRealLanguages)($request->all());
    }
}
