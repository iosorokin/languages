<?php

namespace WIP\Personal\Authorization;

interface GetManager
{
    public function __invoke(): Manager;
}
