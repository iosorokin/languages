<?php

declare(strict_types=1);

namespace App\Contracts\Presenters\Education\Word;

use App\Contracts\Contexts\Client;

interface CreateWordPresenter
{
    public function __invoke(Client $client, string $word);
}
