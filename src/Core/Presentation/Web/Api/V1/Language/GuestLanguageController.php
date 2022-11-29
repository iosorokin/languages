<?php

declare(strict_types=1);

namespace App\Presentation\Web\Api\V1\Language;

use App\Education\Languages\Model\Manager\Queries\Guest\GuestIndexLanguages;
use App\Education\Languages\Model\Manager\Queries\Guest\GuestShowLanguage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Core\Infrastructure\Support\Responses\Json\OkResponse;
use Core\Infrastructure\Support\Transformers\GuestLanguageTransformer;

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
