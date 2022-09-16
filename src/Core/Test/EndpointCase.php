<?php

namespace Core\Test;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;

class EndpointCase extends TestCase
{
    use DatabaseMigrations;
    use ValidatesOpenApiSpec;

    protected $seed = true;
}
