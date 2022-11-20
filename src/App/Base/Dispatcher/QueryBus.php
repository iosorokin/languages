<?php

namespace App\Base\Dispatcher;

interface QueryBus
{
    public function dispatch(Query $query): array;
}
