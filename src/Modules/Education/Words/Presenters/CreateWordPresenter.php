<?php

declare(strict_types=1);

namespace Modules\Education\Words\Presenters;

use App\Contracts\Contexts\Client;

interface CreateWordPresenter
{
    public function __invoke(Client $client, string $word);
}
