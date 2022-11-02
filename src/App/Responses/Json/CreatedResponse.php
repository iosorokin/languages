<?php

namespace App\Responses\Json;

use Illuminate\Http\JsonResponse;

class CreatedResponse extends JsonResponse
{
    public function __construct(?string $location = null)
    {
        $status = 201;
        $headers = [];

        if($location) {
            $headers['location'] = $location;
        }

        parent::__construct('', $status, $headers);
    }
}
