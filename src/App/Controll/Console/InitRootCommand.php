<?php

declare(strict_types=1);

namespace App\Controll\Console;

use App\Console\InitRootUser;
use Illuminate\Console\Command;

final class InitRootCommand extends Command
{
    protected $signature = 'folyod:root {name} {email} {password}';

    public function handle(InitRootUser $presenter): void
    {
        $arg = $this->arguments();

        $presenter($arg);
    }
}
