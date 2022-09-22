<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Personal\Employers\Tests\EmployerHelper;

final class EmployerSeeder extends Seeder
{
    public function run()
    {
        $helper = EmployerHelper::new();
        $helper->createSuperAdmin();
    }
}
