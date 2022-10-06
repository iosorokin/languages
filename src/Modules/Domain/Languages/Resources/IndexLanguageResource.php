<?php

namespace Modules\Domain\Languages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Domain\Languages\Contexts\FillLanguage;

class IndexLanguageResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var FillLanguage $resource */
        $resource = $this->resource;

        return [
            'id' => $resource->getId(),
            'name' => $resource->getName(),
            'native_name' => $resource->getNativeName(),
            'code' => $resource->getCode(),
        ];
    }
}
