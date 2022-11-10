<?php

declare(strict_types=1);

namespace App\Base\Filter;

use _PHPStan_bcbc46924\Nette\Neon\Exception;

final class MultipleFilter implements Filter
{
    private array $filters = [];

    private array $items = [];

    public function addItem(FilterItem $item): self
    {
        $this->items[$item::class] = $item;

        return $this;
    }

    public function addFilter(Filter $filter): self
    {
        $this->filters[$filter::class] = $filter;

        return $this;
    }

    public function getItem(string $name): MultipleFilter
    {
        if (isset($this->items[$name])) {
            $item = $this->items[$name];
        }

        if (! isset($item)) {
            foreach ($this->filters as $filter) {
                if ($filter->has($name)) {
                    $item = $filter->getItem($name);
                }
            }
        }

        return $item ?? throw new Exception(sprintf('Нет фильтра с такими названием %s', $name));
    }

    public function hasItem(string $name): bool
    {
        $hasItem = isset($this->items[$name]);

        if (! $hasItem) {
            foreach ($this->filters as $filter) {
                $hasItem = $filter->hasItem($name);
            }
        }

        return $hasItem ?? false;
    }
}
