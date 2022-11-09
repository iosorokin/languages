<?php

declare(strict_types=1);

namespace App\Controll\Controllers\Language;

use App\Responses\Json\OkResponse;
use App\Transformers\UserLanguageTransformer;
use Domain\Core\Languages\Model\Manager\Queries\User\UserIndexLanguages;
use Domain\Core\Languages\Model\Manager\Queries\User\UserShowLanguage;
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
