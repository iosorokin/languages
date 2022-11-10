<?php

declare(strict_types=1);

namespace App\Controll\Controllers\Language;

use App\Support\Responses\Json\OkResponse;
use App\Support\Transformers\GuestLanguageTransformer;
use Domain\Core\Languages\Model\Manager\Queries\Guest\GuestIndexLanguages;
use Domain\Core\Languages\Model\Manager\Queries\Guest\GuestShowLanguage;
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
