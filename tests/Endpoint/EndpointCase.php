<?php

namespace Tests\Endpoint;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EndpointCase extends TestCase
{
    use DatabaseMigrations;

    protected $seed = true;
}
