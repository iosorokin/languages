<?php

namespace App\Base\Event;

interface EventDispatcher
{
    public function dispatch(Event $event): void;

    public function dispatchAll(array $events): void;
}
