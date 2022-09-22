<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Personal;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Personal\Employers\GetEmployerPresenter;
use App\Contracts\Structures\EmployerStructure;
use Core\Test\Helper;
use Modules\Personal\Employers\Presenters\Admin\CreateSuperAdmin;
use Modules\Personal\Employers\Repositories\EmployerRepository;

final class EmployerHelper extends Helper
{
    public const SEEDED_SUPER_ADMIN_ID = 1;

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

        return $repository->getById(self::SEEDED_SUPER_ADMIN_ID);
    }
}
