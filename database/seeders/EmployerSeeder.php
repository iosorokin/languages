<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Tests\Helpers\Personal\EmployerHelper;
use Illuminate\Database\Seeder;

final class EmployerSeeder extends Seeder
{
    public function run()
    {
        $helper = EmployerHelper::new();
        $helper->createSuperAdmin();
    }
}
