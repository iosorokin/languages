<?php

namespace App\Base\Filter;

interface Filter
{
    public function add(Filter $filter): static;

    public function get(string|Filter $filter): Filter;

    public function has(string|Filter $filter): bool;

    public function delete(string|Filter $filter): void;
}
