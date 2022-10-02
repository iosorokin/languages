<?php

namespace Modules\Languages\Controllers\Api;


use Illuminate\Http\Request;
use Modules\Languages\Presenters\Admin\AdminIndexLanguages;

class IndexLanguagesController
{
    public function __construct(
        private AdminIndexLanguages $indexRealLanguages
    ) {}

    public function __invoke(Request $request)
    {
        return ($this->indexRealLanguages)($request->all());
    }
}
