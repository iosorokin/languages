<?php

declare(strict_types=1);

namespace Domain\Presentation\Web\Api\V1\Language;

use Domain\Education\Languages\Model\Manager\Commands\User\UserAddLanguageToFavorite;
use Domain\Education\Languages\Model\Manager\Commands\User\UserRemoveFromFavorite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Core\Infrastructure\Support\Responses\Json\NoContentResponse;
use Core\Infrastructure\Support\Responses\Json\OkResponse;

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
