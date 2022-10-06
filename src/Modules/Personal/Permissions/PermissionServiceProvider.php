<?php

declare(strict_types=1);

namespace Modules\Personal\Permissions;

use Illuminate\Support\ServiceProvider;
use Modules\Personal\Permissions\Factories\ModelPermissionFactory;
use Modules\Personal\Permissions\Factories\PermissionFactory;
use Modules\Personal\Permissions\Internal\AssignPermission;
use Modules\Personal\Permissions\Internal\AssignPermissionPresenter;
use Modules\Personal\Permissions\Repositories\EloquentPermissionRepository;
use Modules\Personal\Permissions\Repositories\PermissionRepository;

final class PermissionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(AssignPermissionPresenter::class, AssignPermission::class);
        $this->app->bind(PermissionFactory::class, ModelPermissionFactory::class);
        $this->app->bind(PermissionRepository::class, EloquentPermissionRepository::class);
    }
}
