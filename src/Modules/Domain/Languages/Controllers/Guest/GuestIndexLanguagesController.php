<?php

namespace Modules\Domain\Languages\Controllers\Guest;

use Core\Http\Responses\Json\OkResponse;
use Core\Services\Transformer\CollectionTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Domain\Languages\Presenters\Guest\GuestIndexLanguagesPresenter;
use Modules\Domain\Languages\Transformers\LanguageTransformer;

class GuestIndexLanguagesController
{
    public function __construct(
        private GuestIndexLanguagesPresenter $indexLanguages,
        private CollectionTransformer $transformer,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $languages = ($this->indexLanguages)($request->all());
        $this->transformer->transform($languages, [
            new LanguageTransformer()
        ]);

        return new OkResponse($languages->toArray());
    }
}
