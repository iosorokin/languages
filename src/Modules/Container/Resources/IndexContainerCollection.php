<?php

declare(strict_types=1);

namespace Modules\Container\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

final class IndexContainerCollection extends ResourceCollection
{
    public $resource = ShowContainerResource::class;
}
