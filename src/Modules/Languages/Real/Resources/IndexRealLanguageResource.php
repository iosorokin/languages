<?php

namespace Modules\Languages\Real\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Languages\Real\Contexts\RealLanguageContext;

class IndexRealLanguageResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var RealLanguageContext $resource */
        $resource = $this->resource;

        return [
            'id' => $resource->getId(),
            'name' => $resource->getName(),
            'native_name' => $resource->getNativeName(),
            'code' => $resource->getCode(),
        ];
    }
}
