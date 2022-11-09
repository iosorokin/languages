<?php

declare(strict_types=1);

namespace App\Controllers\Language;

use App\Responses\Json\OkResponse;
use App\Transformers\GuestLanguageTransformer;
use Domain\Core\Languages\Queries\Guest\GuestIndexLanguages;
use Domain\Core\Languages\Queries\Guest\GuestShowLanguage;
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
