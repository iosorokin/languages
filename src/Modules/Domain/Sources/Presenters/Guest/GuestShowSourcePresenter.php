<?php

namespace Modules\Domain\Sources\Presenters\Guest;

use Modules\Domain\Sources\Structures\Source;

interface GuestShowSourcePresenter
{
    public function __invoke(int $sourceId): Source;
}
