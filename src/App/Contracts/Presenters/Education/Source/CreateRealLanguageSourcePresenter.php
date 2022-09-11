<?php

namespace App\Contracts\Presenters\Education\Source;

use Modules\Personal\Auth\Contexts\ClientContext;

interface CreateRealLanguageSourcePresenter
{
    public function __invoke(ClientContext $client, array $attributes);
}
