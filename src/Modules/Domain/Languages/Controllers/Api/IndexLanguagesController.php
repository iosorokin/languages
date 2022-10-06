<?php

namespace Modules\Domain\Languages\Controllers\Api;


use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\Admin\AdminIndexLanguages;

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
