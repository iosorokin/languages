<?php

declare(strict_types=1);

namespace App\Base\Filter;

abstract class BaseFilter
{
    private array $filters = [];

    public function add(Filter $filter): static
    {
        $this->filters[$filter::class] = $filter;

        return $this;
    }

    public function get(string|Filter $filter): Filter
    {
        $filter = is_string($filter) ? $filter : $filter::class;

        return $this->filters[$filter];
    }

    public function has(string|Filter $filter): bool
    {
        $filter = is_string($filter) ? $filter : $filter::class;

        return isset($this->filters[$filter]);
    }

    public function delete(string|Filter $filter): void
    {

    }
}
