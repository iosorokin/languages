<?php

namespace App\Contracts\Structures;

use App\Contracts\CreateableWords;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $word
 * @property string $creator_type
 * @property string $creator_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
interface WordStructure
{
    public function setCreator(CreateableWords $createable): self;

    public function getCreator(): CreateableWords;
}
