<?php

namespace Modules\Personal\Auth\Structures;

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
