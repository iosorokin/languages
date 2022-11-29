<?php

namespace Core\Base\Dispatcher;

interface QueryBus
{
    public function dispatch(Query $query): array;
}
