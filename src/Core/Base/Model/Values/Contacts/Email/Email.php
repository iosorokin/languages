<?php

namespace Core\Base\Model\Values\Contacts\Email;

use Core\Base\Model\Values\ValueObject;
use Stringable;

interface Email extends ValueObject, Stringable
{
    public function compare(Email $email);
}
