<?php

declare(strict_types=1);

namespace App\Presentation\Web\Api\V1\Language;

use App\Education\Languages\Model\Manager\Queries\User\FindLanguage;
use App\Education\Languages\Model\Manager\Queries\User\GetLanguages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Core\Infrastructure\Support\Responses\Json\OkResponse;
use Core\Infrastructure\Support\Transformers\UserLanguageTransformer;

final class UserLanguageController
{
    public function index(Request $request, GetLanguages $presenter): JsonResponse
    {
        $languages = $presenter($request->all());

        return new OkResponse($languages->transform([
            UserLanguageTransformer::class
        ])->toArray());
    }

    public function show(Request $request, FindLanguage $presenter): JsonResponse
    {
        $language = $presenter((int) $request->route('language_id'));
        $language = (new UserLanguageTransformer())->transform($language);

        return new OkResponse($language);
    }
}
