<?php

declare(strict_types=1);

namespace App\Controllers\Language;

use App\Responses\Json\IdResponse;
use App\Responses\Json\NoContentResponse;
use App\Responses\Json\OkResponse;
use Domain\Core\Languages\Actions\Manager\ManagerCreateLanguage;
use Domain\Core\Languages\Actions\Manager\ManagerDeleteLanguage;
use Domain\Core\Languages\Actions\Manager\ManagerUpdateLanguage;
use Domain\Core\Languages\Queries\Manager\ManagerIndexLanguages;
use Domain\Core\Languages\Queries\Manager\ManagerShowLanguage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class AdminLanguageController
{
    public function store(Request $request, ManagerCreateLanguage $presenter): JsonResponse
    {
        $language = $presenter($request->all());

        return new IdResponse($language->getId());
    }

    public function show(Request $request, ManagerShowLanguage $presenter): JsonResponse
    {
        $language = $presenter((int) $request->route('language_id'), $request->all());

        return new OkResponse(['data' => $language->toArray()]);
    }

    public function index(Request $request, ManagerIndexLanguages $presenter): JsonResponse
    {
        $language = $presenter($request->all());

        return new OkResponse($language->toArray());
    }

    public function update(Request $request, ManagerUpdateLanguage $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'), $request->all());

        return new NoContentResponse();
    }

    public function destroy(Request $request, ManagerDeleteLanguage $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'));

        return new NoContentResponse();
    }
}
