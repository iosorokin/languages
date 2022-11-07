<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Controllers;

use App\Responses\Json\IdResponse;
use App\Responses\Json\NoContentResponse;
use App\Responses\Json\OkResponse;
use Domain\Core\Languages\Application\Presenters\Admin\AdminCreateLanguage;
use Domain\Core\Languages\Application\Presenters\Admin\AdminDeleteLanguage;
use Domain\Core\Languages\Application\Presenters\Admin\AdminIndexLanguages;
use Domain\Core\Languages\Application\Presenters\Admin\AdminShowLanguage;
use Domain\Core\Languages\Application\Presenters\Admin\AdminUpdateLanguage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class AdminLanguageController
{
    public function store(Request $request, AdminCreateLanguage $presenter): JsonResponse
    {
        $language = $presenter($request->all());

        return new IdResponse($language->getId());
    }

    public function show(Request $request, AdminShowLanguage $presenter): JsonResponse
    {
        $language = $presenter((int) $request->route('language_id'), $request->all());

        return new OkResponse(['data' => $language->toArray()]);
    }

    public function index(Request $request, AdminIndexLanguages $presenter): JsonResponse
    {
        $language = $presenter($request->all());

        return new OkResponse($language->toArray());
    }

    public function update(Request $request, AdminUpdateLanguage $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'), $request->all());

        return new NoContentResponse();
    }

    public function destroy(Request $request, AdminDeleteLanguage $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'));

        return new NoContentResponse();
    }
}
