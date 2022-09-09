<?php

namespace App\Base;


use App\Contracts\Structures\AuthableStructure;

abstract class Controller
{
    public function client()
    {
        $getClient = app()->make();
    }
}
