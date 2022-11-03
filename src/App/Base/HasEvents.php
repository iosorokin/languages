<?php

declare(strict_types=1);

namespace App\Base;

use App\Contracts\Event;

trait HasEvents
{
    private array $events;

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
        return $this->events;
    }
}
