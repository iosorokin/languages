<?php

namespace Modules\Languages\Learning\Controllers\Api;

use App\Base\Controller;
use App\Contracts\Presenters\Languages\Learning\LearnRealLanguagePresenter;
use Core\Extensions\Request;
use Core\Http\Responses\NoContentResponse;
use Illuminate\Http\Response;

class LearnRealLanguageController extends Controller
{
    public function __construct(
        private LearnRealLanguagePresenter $realLanguage,
    ) {}

    public function __invoke(Request $request): Response
    {
        $client = $this->client();
        ($this->realLanguage)($client, $request->all());

        return new NoContentResponse();
    }
}
