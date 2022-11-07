<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Controllers;

use App\Responses\Json\OkResponse;
use Domain\Core\Languages\Application\Presenters\User\UserIndexLanguages;
use Domain\Core\Languages\Application\Presenters\User\UserShowLanguage;
use Domain\Core\Languages\Application\Transformers\UserLanguageTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserLanguageController
{
    public function index(Request $request, UserIndexLanguages $presenter): JsonResponse
    {
        $languages = $presenter($request->all());

        return new OkResponse($languages->transform([
            UserLanguageTransformer::class
        ])->toArray());
    }

    public function show(Request $request, UserShowLanguage $presenter): JsonResponse
    {
        $language = $presenter((int) $request->route('language_id'));
        $language = (new UserLanguageTransformer())->transform($language);

        return new OkResponse($language);
    }
}
