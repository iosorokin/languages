<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Controllers;

use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Languages\Application\Presenters\Guest\GuestIndexLanguages;
use Modules\Domain\Languages\Application\Presenters\Guest\GuestShowLanguage;
use Modules\Domain\Languages\Application\Transformers\GuestLanguageTransformer;

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
