<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Entities;

use App\Base\Entity\Identify\IntId;
use App\Base\Entity\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Domain\Sources\Entities\EloquentSourceRelation;

final class SentenceModel extends Model implements Sentence
{
    use IntId;
    use Timestamps;
    use EloquentSourceRelation;

    protected $table = 'sentences';

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
