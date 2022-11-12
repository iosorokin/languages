<?php

namespace WIP\Personal\Account\Model\Entities\Accesses\Policies;

interface DisableAccessPolicy
{
    public function __invoke(): void;
}
