<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Controllers;

use Core\Extensions\Request;
use Core\Http\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Modules\Education\Sentences\Presenters\CreateSentence;

final class StoreSentenceController
{
    public function __construct(
        private CreateSentence $createSentence,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $sentence = ($this->createSentence)($request->all());

        return new NoContentResponse();
    }
}
