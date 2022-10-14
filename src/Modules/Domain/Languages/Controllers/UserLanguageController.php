<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Controllers;

use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\User\UserIndexLanguagesPresenter;
use Modules\Domain\Languages\Presenters\User\UserShowLanguagePresenter;
use Modules\Domain\Languages\Transformers\UserLanguageTransformer;

final class UserLanguageController
{
    public function index(Request $request, UserIndexLanguagesPresenter $presenter): JsonResponse
    {
        $languages = $presenter($request->all());

        return new OkResponse($languages->transform([
            UserLanguageTransformer::class
        ])->toArray());
    }

    public function show(Request $request, UserShowLanguagePresenter $presenter): JsonResponse
    {
        $language = $presenter((int) $request->route('language_id'));
        $language = (new UserLanguageTransformer())->transform($language);

        return new OkResponse($language);
    }
}