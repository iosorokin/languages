<?php

namespace Modules\Core\Languages\Controllers\Api;

use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\Request;
use Modules\Core\Languages\Presenters\Admin\AdminCreateLanguagePresenter;

class CreateLanguageController extends Controller
{
    public function __construct(
        private AdminCreateLanguagePresenter $newRealLanguage,
    ) {}

    public function __invoke(Request $request)
    {
        $user = $this->client();
        $language = ($this->newRealLanguage)($request->all());

        return new CreatedResponse();
    }
}
