<?php

declare(strict_types=1);

namespace App\Controll\Console;

use Illuminate\Console\Command;

final class InitRootCommand extends Command
{
    protected $signature = 'folyod:root {name} {email} {password}';

    public function handle( $presenter): void
    {
        $arg = $this->arguments();

        $presenter($arg);
    }
}
