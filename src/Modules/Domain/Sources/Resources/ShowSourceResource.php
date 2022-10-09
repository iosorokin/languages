<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Domain\Sources\Entities\Source;
use Modules\Internal\Container\Resources\ShowContainerResource;

final class ShowSourceResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var JsonResource&Source $this */

        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'type' => $this->getType(),
            'description' => $this->getDescription(),
            'container' => ShowContainerResource::make($this->getContainer()),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];
    }
}
