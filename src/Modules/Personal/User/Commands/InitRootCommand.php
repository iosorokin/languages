<?php

declare(strict_types=1);

namespace Modules\Personal\User\Commands;

use Illuminate\Console\Command;
use Modules\Personal\User\Presenters\Special\InitRootUserPresenter;

final class InitRootCommand extends Command
{
    protected $signature = 'folyod:root {name} {email} {password}';

    public function handle(InitRootUserPresenter $presenter): void
    {
        $arg = $this->arguments();

        $presenter($arg);
    }
}
