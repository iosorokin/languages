<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Personal\Employers\GetEmployerPresenter;
use App\Contracts\Structures\EmployerStructure;
use Modules\Personal\Employers\Repositories\EmployerRepository;

final class GetEmployer implements GetEmployerPresenter
{
    public function __construct(
        private EmployerRepository $repository
    ) {}

    public function __invoke(Client $client, int $id): EmployerStructure
    {
        $employer = $this->repository->getById($id);

        return $employer;
    }
}
