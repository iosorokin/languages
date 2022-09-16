<?php

namespace Core\Http\Responses\Json;

use Illuminate\Http\JsonResponse;

class NoContentResponse extends JsonResponse
{
    public function __construct()
    {
        parent::__construct('', 204);
    }
}
