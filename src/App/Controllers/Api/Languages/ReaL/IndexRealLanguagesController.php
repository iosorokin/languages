<?php

namespace App\Controllers\Api\Languages\ReaL;


use App\Presenters\Languages\Real\GetRealLanguages;
use Illuminate\Http\Request;

class IndexRealLanguagesController
{
    public function __construct(
        private GetRealLanguages $getRealLanguages
    ) {}

    public function __invoke(Request $request)
    {
        $collection = ($this->getRealLanguages)($request->all());

        dd($collection);
    }
}
