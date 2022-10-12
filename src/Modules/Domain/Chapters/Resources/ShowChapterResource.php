<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Internal\Container\Structures\Container;

final class ShowChapterResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Container $this */

        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'elements' => $this->getElements(),
        ];
    }
}
