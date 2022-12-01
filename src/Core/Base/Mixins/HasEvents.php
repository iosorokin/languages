<?php

declare(strict_types=1);

namespace Core\Base\Mixins;

use Core\Base\Event\Event;

trait HasEvents
{
    private array $events = [];

    private array $publishedEvents = [];

    public function pushEvent(Event $event): self
    {
        $this->events[$event::class] = $event;

        return $this;
    }

    public function deleteEvent(Event $event): self
    {
        unset($this->events[$event::class]);

        return $this;
    }

    public function events(): array
    {
        return $this->publishedEvents;
    }

    public function publishEvents(): void
    {
        $this->publishedEvents = $this->events;
    }
}
