<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Presenters\Admin;

use App\Clients\ConsoleUser;
use Modules\Personal\Employers\Enums\Position;
use Modules\Personal\Employers\Presenters\RegisterEmployerPresenter;

final class CreateSuperAdmin implements CreateSuperAdminPresenter
{
    public function __construct(
        private RegisterEmployerPresenter $registerEmployer,
    ) {}

    public function __invoke(array $attributes): void
    {
        $attributes += [
            'position' => Position::SuperAdmin
        ];
        $client = new ConsoleUser();
        ($this->registerEmployer)($client, $attributes);
    }
}