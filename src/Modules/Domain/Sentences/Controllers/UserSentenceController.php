<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Controllers;

use Core\Http\Controller;
use Core\Http\Responses\Json\IdResponse;
use Core\Http\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Sentences\Presenters\User\UserStoreSentence;
use Modules\Domain\Sources\Presenters\User\UserDeleteSource;

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
