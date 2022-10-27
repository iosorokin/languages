<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Controllers\Items;

use Illuminate\Http\Request;
use Modules\Core\Sources\Presenters\Guest\GuestIndexSources;

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