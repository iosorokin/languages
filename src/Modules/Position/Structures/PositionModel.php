<?php

namespace Modules\Position\Structures;

use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model implements PositionStructure
{
    protected $table = 'positions';
}
