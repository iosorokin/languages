<?php

declare(strict_types=1);

namespace App\Controll\Controllers\Language;

use App\Responses\Json\IdResponse;
use App\Responses\Json\NoContentResponse;
use App\Responses\Json\OkResponse;
use Domain\Core\Languages\Model\Manager\Commands\Manager\ManagerCreateLanguageHandler;
use Domain\Core\Languages\Model\Manager\Commands\Manager\ManagerDeleteLanguageHandler;
use Domain\Core\Languages\Model\Manager\Commands\Manager\ManagerUpdateLanguageHandler;
use Domain\Core\Languages\Model\Manager\Queries\Manager\ManagerFindLanguage;
use Domain\Core\Languages\Model\Manager\Queries\Manager\ManagerGetLanguages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class AdminLanguageController
{
    public function store(Request $request, ManagerCreateLanguageHandler $presenter): JsonResponse
    {
        $language = $presenter($request->all());

        return new IdResponse($language->getId());
    }

    public function show(Request $request, ManagerFindLanguage $presenter): JsonResponse
    {
        $language = $presenter((int) $request->route('language_id'), $request->all());

        return new OkResponse(['data' => $language->toArray()]);
    }

    public function index(Request $request, ManagerGetLanguages $presenter): JsonResponse
    {
        $language = $presenter($request->all());

        return new OkResponse($language->toArray());
    }

    public function update(Request $request, ManagerUpdateLanguageHandler $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'), $request->all());

        return new NoContentResponse();
    }

    public function destroy(Request $request, ManagerDeleteLanguageHandler $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'));

        return new NoContentResponse();
    }
}
