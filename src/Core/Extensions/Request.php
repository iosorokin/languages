<?php

declare(strict_types=1);

namespace Core\Extensions;

use Illuminate\Http\Request as LaravelRequest;

class Request
{
    final public function __construct(
        public readonly LaravelRequest $request
    ) {}

    public function all(): array
    {
        return $this->request->all()
            + $this->request->route()->parameters();
    }

    public function get(string $key): mixed
    {
        return $this->request->$key;
    }
}
