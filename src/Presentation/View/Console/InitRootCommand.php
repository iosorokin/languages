<?php

declare(strict_types=1);

namespace Domain\Presentation\Console;

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
