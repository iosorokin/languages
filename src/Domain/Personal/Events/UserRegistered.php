<?php

declare(strict_types=1);

namespace Domain\Personal\Events;

use App\Contracts\Event;
use App\Values\Contacts\Email\Email;
use App\Values\Identificatiors\Id\IntId;

final class UserRegistered implements Event
{
    public function __construct(
        public IntId $id,
        public Email $email,
    ) {}
}
