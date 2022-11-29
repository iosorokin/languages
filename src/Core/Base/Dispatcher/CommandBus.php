<?php

namespace Core\Base\Dispatcher;

interface CommandBus
{
    public function dispatch(Command $command): array;
}
