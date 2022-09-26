<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Tests;

use App\Contracts\Contexts\Client;
use Core\Base\Helpers\AppHelper;
use Modules\Personal\Auth\Tests\BaseAuthHelper;
use Modules\Personal\Employers\Presenters\Admin\CreateSuperAdmin;
use Modules\Personal\Employers\Presenters\GetEmployerPresenter;
use Modules\Personal\Employers\Repositories\EmployerRepository;
use Modules\Personal\Employers\Structures\EmployerStructure;
use Modules\Personal\User\Tests\UserHelper;

final class EmployerHelper extends AppHelper
{
    public function __construct(
        private UserHelper     $userHelper,
        private BaseAuthHelper $authHelper,
    ) {}

    public function generateAttributes(): array
    {
        $user = $this->userHelper->generateAttributes();
        $baseAuth = $this->authHelper->generateAttributes();
        $employer = [

        ];

        return $user + $baseAuth + $employer;
    }

    public function createSuperAdmin(): void
    {
        /** @var CreateSuperAdmin $createSuperAdmin */
        $createSuperAdmin = app()->make(CreateSuperAdmin::class);
        $createSuperAdmin($this->generateAttributes());
    }

    public function getEmployer(Client $client, int $id): EmployerStructure
    {
        $getEmployer = app()->make(GetEmployerPresenter::class);

        return $getEmployer($client, $id);
    }

    public function getSuperAdminStructure(): EmployerStructure
    {
        $repository = app()->get(EmployerRepository::class);

        return $repository->getById(1);
    }
}
