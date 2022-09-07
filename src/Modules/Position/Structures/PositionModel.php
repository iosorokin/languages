<?php

namespace Modules\Position\Structures;

use App\Contracts\Structures\PositionStructure;
use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model implements PositionStructure
{
    protected $table = 'positions';
}
