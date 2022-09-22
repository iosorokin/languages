<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Tests;

use Illuminate\Database\Seeder;

final class EmployerSeeder extends Seeder
{
    public function run()
    {
        $helper = EmployerHelper::new();
        $helper->createSuperAdmin();
    }
}
