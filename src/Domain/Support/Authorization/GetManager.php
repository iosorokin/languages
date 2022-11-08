<?php

namespace Domain\Support\Authorization;

interface GetManager
{
    public function __invoke(): Manager;
}
