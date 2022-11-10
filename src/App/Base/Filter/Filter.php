<?php

namespace App\Base\Filter;

interface Filter
{
    public function addItem(FilterItem $item): self;

    public function addFilter(Filter $filter): self;

    public function getItem(string $filter): MultipleFilter;

    public function hasItem(string $filter): bool;
}
