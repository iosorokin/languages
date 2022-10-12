<?php

declare(strict_types=1);

namespace Core\Services\Transformer;

use Core\Base\Collections\Collection;

final class CollectionTransformer
{
    public function transform(Collection $collection, array $transformers): void
    {
        $data = $collection->getData();
        $data->transform(function ($element) use ($transformers) {
            $attr = [];
            foreach ($transformers as $transformer) {
                $attr += $transformer->transform($element);
            }

            return $attr;
        });
    }
}
