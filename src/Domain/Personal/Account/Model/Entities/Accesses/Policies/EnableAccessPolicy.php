<?php

namespace Domain\Personal\Account\Model\Entities\Accesses\Policies;

interface EnableAccessPolicy
{
    public function __invoke(): void;
}
