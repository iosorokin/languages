<?php

declare(strict_types=1);

namespace Core\Base\Collections;

use Core\Services\Pagination\Paginator;
use Illuminate\Support\Collection as LaravelCollection;

abstract class Collection
{
    private ?Paginator $paginator;

    private $lazywrapper;

    public function __construct(
        protected LaravelCollection $collection,
    ) {}

    public function setPaginator(Paginator $paginator): static
    {
        $this->paginator = $paginator;

        return $this;
    }

    public function getPaginator(): Paginator
    {
        return $this->paginator;
    }

    public function getData(): LaravelCollection
    {
        return $this->collection;
    }

    public function toArray(): array
    {
        $body = [];
        if ($this->collection->isNotEmpty()) {
            $body['data'] = $this->collection->toArray();
        }
        if ($this->paginator) {
            $body += $this->paginator->toArray();
        }

        return $body;
    }

    public function lazyWrapper(callable $callback): self
    {
        $this->lazywrapper = $callback;

        return $this;
    }

    public function transform(array $transformers): self
    {
        $data = $this->getData();
        $data->transform(function ($element) use ($transformers) {
            $element = ($this->lazywrapper)($element);
            $attr = [];
            foreach ($transformers as $transformer) {
                $transformer = app($transformer);
                $attr += $transformer->transform($element);
            }

            return $attr;
        });

        return $this;
    }
}
