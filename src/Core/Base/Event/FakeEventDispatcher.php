<?php

declare(strict_types=1);

namespace Core\Base\Event;

final class FakeEventDispatcher implements EventDispatcher
{
    private array $events = [];

    public function dispatch(Event $event): void
    {
        $this->events[$event::class] = $event;
    }

    public function dispatchAll(array $events): void
    {
        foreach ($events as $event) {
            $this->dispatch($event);
        }
    }

    public function hasEvent(string $name): bool
    {
        return isset($name, $this->events);
    }
}
