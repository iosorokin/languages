<?php

namespace App\Base\Dispatcher;

interface CommandBus
{
    public function dispatch(Command $command): array;
}
