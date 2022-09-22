<?php

namespace Modules\Languages\Real\Structures;

use App\Contracts\Structures\LearnableStructure;
use App\Contracts\Structures\RealLanguageStructure;
use Illuminate\Database\Eloquent\Model;

class RealLanguageModel extends Model implements RealLanguageStructure, LearnableStructure
{
    protected $table = 'real_languages';
}
