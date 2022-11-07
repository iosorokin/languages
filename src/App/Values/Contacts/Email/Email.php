<?php

namespace App\Values\Contacts\Email;

use App\Values\ValueObject;
use Stringable;

interface Email extends ValueObject, Stringable
{
    public function compare(Email $email);
}
