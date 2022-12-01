<?php

declare(strict_types=1);

namespace Presentation\View\Web;

final class IndexView
{
    public function __construct()
    {
    }

    public function __invoke()
    {
        return view('pages.index');
    }
}
