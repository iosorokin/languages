<?php

declare(strict_types=1);

namespace Core\Base\Request;

use Illuminate\Http\Request;

final class LaravelRequestData implements RequestData
{
    public function __construct(
        private Request $request
    ) {}

    public function get(string $key, mixed $default = null): mixed
    {
        $attribute = $this->request->get($key);
        if (! $attribute)
            $attribute = $this->request->route($key);

        if (! $attribute)
            $attribute = $default;

        return $attribute;
    }

    public function has(string $key): bool
    {
        $hasAttribute = $this->request->has($key);
        if (! $hasAttribute) {
            $hasAttribute = $this->request->route()->hasParameter($key);
        }

        return $hasAttribute;
    }

    public function toArray(): array
    {
        return $this->request->all()
            + $this->request->route()
                ->parameters();
    }
}
