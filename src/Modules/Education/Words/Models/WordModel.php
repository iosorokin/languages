<?php

declare(strict_types=1);

namespace Modules\Education\Words\Models;

use App\Contracts\CreateableWords;
use App\Contracts\Structures\WordStructure;
use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

final class WordModel extends Model implements WordStructure
{
    protected $table = 'words';

    private function creator(): MorphTo
    {
        return $this->morphTo();
    }

    public function setCreator(CreateableWords $createable): self
    {
        Assert::isInstanceOf($createable, Model::class);
        /** @var Model $createable */
        $this->creator()->associate($createable);

        return $this;
    }

    public function getCreator(): CreateableWords
    {
        return $this->creator;
    }
}
