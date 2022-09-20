<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Commands;

use Illuminate\Console\Command;
use Modules\Personal\Employers\Presenters\Admin\CreateSuperAdmin;

final class CreateSuperAdminCommand extends Command
{
    protected $signature = 'super_admin:create {name} {email} {password}';

    public function handle(CreateSuperAdmin $createSuperAdmin): void
    {
        $createSuperAdmin($this->arguments());
    }
}
