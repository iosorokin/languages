<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Transformers;

use Modules\Domain\Sources\Structures\Source;

abstract class SourceTransformer
{
    public function detail(Source $source): array
    {
        return [
            'id' => $source->getId(),
            'language_id' => $source->getLanguageId(),
            'user_id' => $source->getUserId(),
            'type' => $source->getType(),
            'title' => $source->getTitle(),
            'description' => $source->getDescription(),
            'container_id' => $source->getContainer()->getId(),
        ];
    }
}
