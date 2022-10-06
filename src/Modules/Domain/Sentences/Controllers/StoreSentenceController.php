<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Modules\Core\Sentences\Presenters\User\UserCreateSentence;

final class StoreSentenceController extends Controller
{
    public function __construct(
        private UserCreateSentence $createSentence,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $sentence = ($this->createSentence)($request->all());

        return new NoContentResponse();
    }
}
