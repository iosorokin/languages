<?php

namespace Modules\Domain\Languages\Controllers\Admin;

use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\Admin\AdminCreateLanguagePresenter;

class AdminCreateLanguageController
{
    public function __construct(
        private AdminCreateLanguagePresenter $newRealLanguage,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $language = ($this->newRealLanguage)($request->all());
        $location = route('api.languages.show', ['language_id' => $language->getId()]);

        return new CreatedResponse($location);
    }
}
