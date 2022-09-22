<?php

namespace App\Contracts\Presenters\Personal\Employers;

use App\Contracts\Contexts\Client;
use Modules\Personal\Employers\Structures\EmployerModel;

interface RegisterEmployerPresenter
{
    public function __invoke(Client $client, array $attributes): EmployerModel;
}
