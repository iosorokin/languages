<?php

namespace Modules\Languages\Learning\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Modules\Languages\Learning\Presenters\LearnRealLanguagePresenter;

class LearnRealLanguageController extends Controller
{
    public function __construct(
        private LearnRealLanguagePresenter $realLanguage,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $client = $this->client();
        ($this->realLanguage)($client, $request->all());

        return new CreatedResponse();
    }
}
