<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Controllers;

use Core\Http\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\Support\Responses\Json\IdResponse;
use Infrastructure\Support\Responses\Json\NoContentResponse;
use WIP\Core\Sentences\Presenters\User\UserStoreSentence;
use WIP\Core\Sources\Presenters\User\UserDeleteSource;

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
