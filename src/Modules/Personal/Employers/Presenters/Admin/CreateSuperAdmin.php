<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Presenters\Admin;

use App\Clients\ConsoleUser;
use App\Contracts\Presenters\Personal\Employers\RegisterEmployerPresenter;
use Modules\Personal\Employers\Enums\Position;

final class CreateSuperAdmin
{
    public function __construct(
        private RegisterEmployerPresenter $registerEmployer,
    ) {}

    public function __invoke(array $attributes): void
    {
        $client = new ConsoleUser();
        ($this->registerEmployer)($client, [
            'position' => Position::SuperAdmin
        ]);
    }
}
