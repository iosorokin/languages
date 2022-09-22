<?php

declare(strict_types=1);

namespace Modules\Personal\Employers;

use Illuminate\Support\ServiceProvider;
use Modules\Personal\Employers\Presenters\Admin\CreateSuperAdmin;
use Modules\Personal\Employers\Presenters\Admin\CreateSuperAdminPresenter;
use Modules\Personal\Employers\Presenters\GetEmployer;
use Modules\Personal\Employers\Presenters\GetEmployerPresenter;
use Modules\Personal\Employers\Presenters\RegisterEmployer;
use Modules\Personal\Employers\Presenters\RegisterEmployerPresenter;
use Modules\Personal\Employers\Repositories\EloquentEmployerRepository;
use Modules\Personal\Employers\Repositories\EmployerRepository;

final class EmployerProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(RegisterEmployerPresenter::class, RegisterEmployer::class);
        $this->app->bind(CreateSuperAdminPresenter::class, CreateSuperAdmin::class);
        $this->app->bind(GetEmployerPresenter::class, GetEmployer::class);

        $this->app->bind(EmployerRepository::class, EloquentEmployerRepository::class);
    }
}
