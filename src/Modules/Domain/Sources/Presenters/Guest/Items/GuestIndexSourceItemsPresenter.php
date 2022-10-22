<?php

namespace Modules\Domain\Sources\Presenters\Guest\Items;

interface GuestIndexSourceItemsPresenter
{
    public function __invoke(int $sourceId, array $attributes);
}
