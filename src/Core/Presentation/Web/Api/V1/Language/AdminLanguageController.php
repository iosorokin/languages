<?php

declare(strict_types=1);

namespace App\Presentation\Web\Api\V1\Language;

use App\Education\Languages\Model\Manager\Commands\Manager\CreateLanguageHandler;
use App\Education\Languages\Model\Manager\Commands\Manager\DeleteLanguageHandler;
use App\Education\Languages\Model\Manager\Commands\Manager\UpdateLanguageHandler;
use App\Education\Languages\Model\Manager\Queries\Manager\FindLanguageHandler;
use App\Education\Languages\Model\Manager\Queries\Manager\GetLanguagesHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Core\Infrastructure\Support\Responses\Json\IdResponse;
use Core\Infrastructure\Support\Responses\Json\NoContentResponse;
use Core\Infrastructure\Support\Responses\Json\OkResponse;

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
