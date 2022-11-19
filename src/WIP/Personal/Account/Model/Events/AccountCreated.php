<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Events;

use App\Base\Event\Event;
use App\Base\Model\Values\Identificatiors\Id\IntId;

final class AccountCreated implements Event
{
    public function __construct(
        public IntId $id,
    ) {}
}
