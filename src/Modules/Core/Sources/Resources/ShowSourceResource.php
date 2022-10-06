<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Container\Resources\ShowContainerResource;
use Modules\Core\Sources\Entities\Source;

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
