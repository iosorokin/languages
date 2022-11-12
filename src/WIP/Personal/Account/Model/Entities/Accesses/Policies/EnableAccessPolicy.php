<?php

namespace WIP\Personal\Account\Model\Entities\Accesses\Policies;

interface EnableAccessPolicy
{
    public function __invoke(): void;
}
