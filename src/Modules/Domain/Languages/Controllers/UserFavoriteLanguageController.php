<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Controllers;

use Core\Http\Responses\Json\NoContentResponse;
use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\User\UserAddLanguageToFavorite;
use Modules\Domain\Languages\Presenters\User\UserRemoveFromFavorite;

final class UserFavoriteLanguageController
{
    public function store(Request $request, UserAddLanguageToFavorite $presenter): JsonResponse
    {
        $favorite = $presenter((int) $request->route('language_id'));

        return new OkResponse([
            'data' => [
                'id' => $favorite->getId(),
            ]
        ]);
    }

    public function destroy(Request $request, UserRemoveFromFavorite $removeFavorite): JsonResponse
    {
        ($removeFavorite)($request->route()->parameters());

        return new NoContentResponse();
    }
}
