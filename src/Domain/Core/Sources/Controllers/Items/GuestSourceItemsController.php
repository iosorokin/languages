<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Controllers\Items;

use Domain\Core\Sources\Presenters\Guest\GuestIndexSources;
use Illuminate\Http\Request;

final class GuestSourceItemsController
{
    public function __construct()
    {
    }

    public function index(Request $request, GuestIndexSources $presenter)
    {
        $items = $presenter($request->all());

        return $items;
    }
}
