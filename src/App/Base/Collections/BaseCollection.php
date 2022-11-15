<?php

declare(strict_types=1);

namespace App\Base\Collections;

use Infrastructure\Services\Pagination\Paginator;

abstract class BaseCollection
{
    private ?Paginator $paginator;

    private array $wrappers = [];

    public function __construct(
        protected Collection $collection,
    )
    {
    }

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

    public function addWrapper(callable $callback): self
    {
        $this->wrappers[] = $callback;

        return $this;
    }

    public function transform(array $transformers): self
    {
        $data = $this->getData();
        $data->transform(function ($element) use ($transformers) {
            $this->wrap($element);
            $attr = [];
            foreach ($transformers as $transformer) {
                $transformer = app($transformer);
                $attr += $transformer->transform($element);
            }

            return $attr;
        });

        return $this;
    }

    private function wrap($element)
    {
        foreach ($this->wrappers as $wrapper) {
            $wrapper($element);
        }
    }
}
