<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Controllers;

use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Core\Languages\Application\Presenters\User\UserIndexLanguages;
use Modules\Core\Languages\Application\Presenters\User\UserShowLanguage;
use Modules\Core\Languages\Application\Transformers\UserLanguageTransformer;

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
