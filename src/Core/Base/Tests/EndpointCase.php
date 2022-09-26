<?php

namespace Core\Base\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class EndpointCase extends TestCase
{
    use DatabaseMigrations;
//    use ValidatesOpenApiSpec;

    protected $seed = true;
}
