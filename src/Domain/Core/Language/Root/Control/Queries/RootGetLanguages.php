<?php

namespace Domain\Core\Language\Root\Control\Queries;

interface RootGetLanguages
{
    public function name(): ?string;

    public function code(): ?string;
}
