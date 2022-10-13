<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Structures;

use App\Base\Structures\EloquentHasDescription;
use App\Base\Structures\Identify\IntId;
use App\Base\Structures\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Domain\Sentences\Structures\EloquentSentenceRelation;
use Modules\Personal\User\Structures\EloquentUserRelation;

final class AnalysisModel extends Model implements Analysis
{
    use IntId;
    use EloquentHasDescription;
    use Timestamps;
    use EloquentSentenceRelation;
    use EloquentUserRelation;

    protected $table = 'analysis';

    public function setTranslate(string $translate): self
    {
        $this->translate = $translate;

        return $this;
    }

    public function getTranslate(): string
    {
        return $this->translate;
    }
}