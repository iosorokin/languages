<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Responses\Json;

use Illuminate\Http\JsonResponse;

final class OkResponse extends JsonResponse
{
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
