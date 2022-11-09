<?php

namespace Domain\Personal\Authorization;

interface GetManager
{
    public function __invoke(): Manager;
}
