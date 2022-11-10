<?php

namespace App\Model\Values\Contacts\Email;

use App\Model\Values\ValueObject;
use Stringable;

interface Email extends ValueObject, Stringable
{
    public function compare(Email $email);
}
