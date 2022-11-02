<?php

declare(strict_types=1);

namespace Domain\Sentences\Controllers;

use App\Responses\Json\IdResponse;
use App\Responses\Json\NoContentResponse;
use Core\Http\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Domain\Sentences\Presenters\User\UserStoreSentence;
use Domain\Sources\Presenters\User\UserDeleteSource;

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
