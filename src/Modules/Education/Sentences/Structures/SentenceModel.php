<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Structures;

use Illuminate\Database\Eloquent\Model;

final class SentenceModel extends Model implements SentenceStructure
{
    protected $table = 'sentences';
}
