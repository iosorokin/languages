<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Transformers;

use WIP\Core\Sources\Structures\Source;

abstract class SourceTransformer
{
    public function detail(Source $source): array
    {
        return [
            'id' => $source->id,
            'language_id' => $source->lanaguage_id,
            'user_id' => $source->user_id,
            'type' => $source->type,
            'title' => $source->title,
            'description' => $source->description,
            'container_id' => $source->container_id,
        ];
    }
}
