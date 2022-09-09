<?php

namespace Modules\Languages\Learning\Controllers\Api;

use App\Base\Controller;
use App\Contracts\Presenters\Languages\Learning\LearnRealLanguagePresenter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LearnRealLanguageController extends Controller
{
    public function __construct(
        private LearnRealLanguagePresenter $realLanguage,
    ) {}

    public function __invoke(Request $request): Response
    {
        ($this->realLanguage)($request->all());

        return response();
    }
}
