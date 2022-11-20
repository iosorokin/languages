<?php

namespace App\Base\Dispatcher;

interface EventBus
{
    public function dispatch(Event $event): array;
}
