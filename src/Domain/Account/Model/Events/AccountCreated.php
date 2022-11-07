<?php

declare(strict_types=1);

namespace Domain\Account\Model\Events;

use App\Contracts\Event;
use App\Values\Contacts\Email\Email;
use App\Values\Identificatiors\Id\IntId;

final class AccountCreated implements Event
{
    public function __construct(
        public IntId $id,
    ) {}
}
