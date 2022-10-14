<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Controllers;

use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\Guest\GuestIndexLanguagesPresenter;
use Modules\Domain\Languages\Presenters\Guest\GuestShowLanguagePresenter;
use Modules\Domain\Languages\Transformers\GuestLanguageTransformer;
use Modules\Domain\Languages\Transformers\LanguageTransformer;

final class GuestLanguageController
{
    public function index(Request $request, GuestIndexLanguagesPresenter $presenter): JsonResponse
    {
        $languages = $presenter($request->all());

        return new OkResponse($languages->transform([
            GuestLanguageTransformer::class
        ])->toArray());
    }

    public function show(Request $request, GuestShowLanguagePresenter $presenter): JsonResponse
    {
        $language = $presenter((int) $request->route('language_id'));
        $language = (new GuestLanguageTransformer())->transform($language);

        return new OkResponse($language);
    }
}
