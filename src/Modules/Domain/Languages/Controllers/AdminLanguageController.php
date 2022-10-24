<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Controllers;

use Core\Http\Responses\Json\IdResponse;
use Core\Http\Responses\Json\NoContentResponse;
use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\Admin\AdminCreateLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminDeleteLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminIndexLanguages;
use Modules\Domain\Languages\Presenters\Admin\AdminShowLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminUpdateLanguage;

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
