<?php

namespace Modules\Education\Source\Presenters;

use Modules\Personal\Auth\Contexts\ClientContext;

interface CreateRealLanguageSourcePresenter
{
    public function __invoke(ClientContext $client, array $attributes);
}
