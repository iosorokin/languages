<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Controllers;

use App\Responses\Json\OkResponse;
use Domain\Core\Languages\Application\Presenters\Guest\GuestIndexLanguages;
use Domain\Core\Languages\Application\Presenters\Guest\GuestShowLanguage;
use Domain\Core\Languages\Application\Transformers\GuestLanguageTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class GuestLanguageController
{
    public function index(Request $request, GuestIndexLanguages $presenter): JsonResponse
    {
        $languages = $presenter($request->all());

        return new OkResponse($languages->transform([
            GuestLanguageTransformer::class
        ])->toArray());
    }

    public function show(Request $request, GuestShowLanguage $presenter): JsonResponse
    {
        $language = $presenter((int) $request->route('language_id'));
        $language = (new GuestLanguageTransformer())->transform($language);

        return new OkResponse($language);
    }
}
