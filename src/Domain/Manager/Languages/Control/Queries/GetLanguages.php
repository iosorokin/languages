<?php

namespace Domain\Core\Languages\Model\Manager\Queries;

interface GetLanguages
{
    public function name(): ?string;

    public function code(): ?string;
}
