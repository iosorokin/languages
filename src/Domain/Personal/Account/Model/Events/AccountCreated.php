<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Events;

use App\Contracts\Event;
use App\Model\Values\Identificatiors\Id\IntId;

final class AccountCreated implements Event
{
    public function __construct(
        public IntId $id,
    ) {}
}
