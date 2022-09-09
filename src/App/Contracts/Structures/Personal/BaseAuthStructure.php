<?php

namespace App\Contracts\Structures\Personal;

use App\Contracts\Structures\AuthableStructure;

/**
 * @property string $authable_type
 * @property int $authable_id
 * @property string $email
 * @property string $password
 */
interface BaseAuthStructure
{
    public function setAuthable(AuthableStructure $authable): static;

    public function getAuthable(): AuthableStructure;
}
