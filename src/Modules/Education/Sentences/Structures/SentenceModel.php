<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Structures;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Container\Structures\ContainerModel;
use Modules\Container\Structures\ContainerStructure;

final class SentenceModel extends Model implements SentenceStructure
{
    protected $table = 'sentences';

    private function container(): BelongsTo
    {
        return $this->belongsTo(ContainerModel::class);
    }

    public function setContainer(ContainerStructure $container): self
    {
        $this->container()->associate($container);

        return $this;
    }

    public function getContainer(): ContainerStructure
    {
        return $this->container;
    }
}
