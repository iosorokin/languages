<?php

namespace Modules\Domain\Languages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexLanguageResource extends JsonResource
{
    public $resource = ShowLanguageResource::class;
}
