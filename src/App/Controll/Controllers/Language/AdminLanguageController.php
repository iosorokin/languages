<?php

declare(strict_types=1);

namespace App\Controll\Controllers\Language;

use App\Responses\Json\IdResponse;
use App\Responses\Json\NoContentResponse;
use App\Responses\Json\OkResponse;
use Domain\Core\Languages\Model\Manager\Commands\Manager\CreateLanguageHandler;
use Domain\Core\Languages\Model\Manager\Commands\Manager\DeleteLanguageHandler;
use Domain\Core\Languages\Model\Manager\Commands\Manager\UpdateLanguageHandler;
use Domain\Core\Languages\Model\Manager\Queries\Manager\FindLanguageHandler;
use Domain\Core\Languages\Model\Manager\Queries\Manager\GetLanguagesHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class AdminLanguageController
{
    public function store(Request $request, CreateLanguageHandler $presenter): JsonResponse
    {
        $language = $presenter($request->all());

        return new IdResponse($language->getId());
    }

    public function show(Request $request, FindLanguageHandler $presenter): JsonResponse
    {
        $language = $presenter((int) $request->route('language_id'), $request->all());

        return new OkResponse(['data' => $language->toArray()]);
    }

    public function index(Request $request, GetLanguagesHandler $presenter): JsonResponse
    {
        $language = $presenter($request->all());

        return new OkResponse($language->toArray());
    }

    public function update(Request $request, UpdateLanguageHandler $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'), $request->all());

        return new NoContentResponse();
    }

    public function destroy(Request $request, DeleteLanguageHandler $presenter): JsonResponse
    {
        $presenter((int) $request->route('language_id'));

        return new NoContentResponse();
    }
}
