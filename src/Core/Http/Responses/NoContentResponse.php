<?php

namespace Core\Http\Responses;

use Illuminate\Http\Response;

class NoContentResponse extends Response
{
    public function __construct($content = '', $status = 200, array $headers = [])
    {
        parent::__construct($content, $status, $headers);
    }
}
