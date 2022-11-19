<?php

declare(strict_types=1);

namespace App\Presentation\Web\Api\V1\Language;

use Domain\Core\Languages\Model\Manager\Queries\User\FindLanguage;
use Domain\Core\Languages\Model\Manager\Queries\User\GetLanguages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\Support\Responses\Json\OkResponse;
use Infrastructure\Support\Transformers\UserLanguageTransformer;

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
