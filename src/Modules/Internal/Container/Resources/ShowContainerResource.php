<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Internal\Container\Entites\Container;

final class ShowContainerResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var JsonResource&Container $this */

        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'element' => $this->getElements(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];
    }
}
