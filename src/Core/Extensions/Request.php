<?php

declare(strict_types=1);

namespace Core\Extensions;

use Illuminate\Http\Request as LaravelRequest;

final class Request
{
    public function __construct(
        public readonly LaravelRequest $request
    ) {}

    public function all(): array
    {
        return $this->request->all()
            + $this->request->route()->parameters();
    }
}
