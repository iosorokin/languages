<?php

namespace App\Contracts;

interface Eventable
{
    public function pushEvent(Event $event): self;

    public function deleteEvent(Event $event): self;

    public function events(): array;
}
