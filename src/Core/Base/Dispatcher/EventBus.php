<?php

namespace Core\Base\Dispatcher;

interface EventBus
{
    public function dispatch(Event $event): array;
}
