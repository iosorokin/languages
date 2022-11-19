<?php

namespace App\Base\Model\Values\Contacts\Email;

use App\Base\Model\Values\ValueObject;
use Stringable;

interface Email extends ValueObject, Stringable
{
    public function compare(Email $email);
}
