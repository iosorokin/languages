<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Responses\Json;

use Illuminate\Http\JsonResponse;

final class IdResponse extends JsonResponse
{
    public function __construct(int|string $id)
    {
        parent::__construct([
            'data' => [
                'id' => $id
            ]
        ]);
    }
}
