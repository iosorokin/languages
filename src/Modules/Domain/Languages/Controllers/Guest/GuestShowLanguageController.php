<?php

namespace Modules\Domain\Languages\Controllers\Guest;

use Core\Extensions\Request;
use Core\Http\Responses\Json\OkResponse;
use Illuminate\Http\JsonResponse;
use Modules\Domain\Languages\Presenters\Guest\GuestShowLanguagePresenter;
use Modules\Domain\Languages\Transformers\LanguageTransformer;

class GuestShowLanguageController
{
    public function __construct(
        private GuestShowLanguagePresenter $showLanguage,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $language = ($this->showLanguage)($request->all()['language_id']);
        $language = (new LanguageTransformer())->transform($language);

        return new OkResponse($language);
    }
}
