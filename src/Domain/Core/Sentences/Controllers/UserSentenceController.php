<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Controllers;

use App\Support\Responses\Json\IdResponse;
use App\Support\Responses\Json\NoContentResponse;
use Core\Http\Controller;
use Domain\Core\Sentences\Presenters\User\UserStoreSentence;
use Domain\Core\Sources\Presenters\User\UserDeleteSource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserSentenceController extends Controller
{
    public function store(Request $request, UserStoreSentence $presenter): JsonResponse
    {
        $sentence = ($presenter)($request->all());

        return new IdResponse($sentence->id);
    }

    public function delete(Request $request, UserDeleteSource $presenter): JsonResponse
    {
        ($presenter)((int) $request->route('sentence_id'));

        return new NoContentResponse();
    }
}
