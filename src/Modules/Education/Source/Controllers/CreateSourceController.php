<?php

namespace Modules\Education\Source\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Support\Arr;
use Modules\Education\Source\Enums\LanguageTypes;

class CreateSourceController extends Controller
{
    public function __invoke(Request $request)
    {
        $attributes = $request->all();
        $presenterClassName = LanguageTypes::tryFrom(Arr::get($attributes, 'type'))->getPresenterClassName();
        $presenter = app()->make($presenterClassName);
        $client = $this->client();
        $presenter($client, $attributes);

        return new CreatedResponse();
    }
}
