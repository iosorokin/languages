<?php

namespace Modules\Languages\Real\Structures;

use Illuminate\Database\Eloquent\Model;
use Modules\Languages\LearnableStructure;

class RealLanguageModel extends Model implements RealLanguageStructure, LearnableStructure
{
    protected $table = 'real_languages';
}
