<?php

declare(strict_types=1);

namespace Core\Base\Controller;


use Core\Base\Event\EventDispatcher;

abstract class DomainController
{
    public function __construct(
        protected EventDispatcher $eventDispatcher,
    ) {}
}
