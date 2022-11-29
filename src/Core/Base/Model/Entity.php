<?php

declare(strict_types=1);

namespace Core\Base\Model;

use Core\Base\Event\Event;
use Core\Base\Event\Eventable;
use Core\Base\Model\Values\InvalidValueObject;
use Illuminate\Support\Str;

abstract class Entity implements Eventable
{
    private array $events;

    private array $errors;

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

    public function validate(): array
    {
        foreach ($this as $key => $value) {
            if ($value instanceof InvalidValueObject) {
                $errors[Str::snake($key)] = $value->errors();
            }
        }

        return $errors ?? [];
    }
}
