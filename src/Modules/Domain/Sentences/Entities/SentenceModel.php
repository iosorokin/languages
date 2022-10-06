<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Entities;

use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;

final class SentenceModel extends Model implements Sentence
{
    use EloquentId;
    use EloquentTimestamps;

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
