<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Services\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Modules\Domain\Sentences\Presenters\User\UserCreateSentencePresenter;

final class StoreSentenceController extends Controller
{
    public function __construct(
        private UserCreateSentencePresenter $createSentence,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $sentence = ($this->createSentence)($request->all());

        return new NoContentResponse();
    }
}
