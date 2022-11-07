<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Controllers;

use App\Responses\Json\NoContentResponse;
use App\Responses\Json\OkResponse;
use Domain\Core\Languages\Application\Presenters\User\UserAddLanguageToFavorite;
use Domain\Core\Languages\Application\Presenters\User\UserRemoveFromFavorite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
