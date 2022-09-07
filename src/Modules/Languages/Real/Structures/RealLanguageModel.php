<?php

namespace Modules\Languages\Real\Structures;

use App\Structures\Languages\RealLanguageStructure;
use Illuminate\Database\Eloquent\Model;

class RealLanguageModel extends Model implements RealLanguageStructure
{
    protected $table = 'real_languages';
}
