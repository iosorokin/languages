<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Controllers;

use Core\Http\Responses\Json\CreatedResponse;
use Core\Http\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\Admin\AdminCreateLanguagePresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminDeleteLanguagePresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminUpdateLanguagePresenter;

final class AdminLanguageController
{
    public function store(Request $request, AdminCreateLanguagePresenter $presenter): JsonResponse
    {
        $language = $presenter($request->all());
        $location = route('api.languages.show', ['language_id' => $language->getId()]);

        return new CreatedResponse($location);
    }

    public function update(Request $request, AdminUpdateLanguagePresenter $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'), $request->all());

        return new NoContentResponse();
    }

    public function destroy(Request $request, AdminDeleteLanguagePresenter $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'));

        return new NoContentResponse();
    }
}
