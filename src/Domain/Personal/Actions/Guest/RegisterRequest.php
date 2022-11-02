<?php

namespace Domain\Personal\Actions\Guest;

use App\Contracts\Request;

interface RegisterRequest extends Request
{
    public function getName(): string;

    public function getEmail(): string;

    public function getPassword(): string;
}
