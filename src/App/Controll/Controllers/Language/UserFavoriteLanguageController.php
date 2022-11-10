<?php

declare(strict_types=1);

namespace App\Controll\Controllers\Language;

use Domain\Core\Languages\Model\Manager\Commands\User\UserAddLanguageToFavorite;
use Domain\Core\Languages\Model\Manager\Commands\User\UserRemoveFromFavorite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\Support\Responses\Json\NoContentResponse;
use Infrastructure\Support\Responses\Json\OkResponse;

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
