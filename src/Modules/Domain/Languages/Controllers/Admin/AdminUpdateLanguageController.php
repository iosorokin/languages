<?php

namespace Modules\Domain\Languages\Controllers\Admin;

use Core\Http\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\Admin\AdminUpdateLanguagePresenter;

class AdminUpdateLanguageController
{
    public function __construct(
        private AdminUpdateLanguagePresenter $updateLanguage,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        ($this->updateLanguage)($request->route('language_id'), $request->all());

        return new NoContentResponse();
    }
}
