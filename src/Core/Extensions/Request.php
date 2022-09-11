<?php

namespace Core\Extensions;

use Illuminate\Http\Request as LaravelRequest;

class Request
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
