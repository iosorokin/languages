<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Structures;

use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Domain\Sources\Structures\EloquentSourceRelation;

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
