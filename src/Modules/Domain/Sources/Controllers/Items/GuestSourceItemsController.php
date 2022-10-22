<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Controllers\Items;

use Illuminate\Http\Request;
use Modules\Domain\Sources\Presenters\Guest\GuestIndexSourcesPresenter;

final class GuestSourceItemsController
{
    public function __construct()
    {
    }

    public function index(Request $request, GuestIndexSourcesPresenter $presenter)
    {
        $items = $presenter($request->all());

        return $items;
    }
}
