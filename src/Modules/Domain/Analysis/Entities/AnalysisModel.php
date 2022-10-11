<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Entities;

use App\Base\Entity\EloquentHasDescription;
use App\Base\Entity\Identify\IntId;
use App\Base\Entity\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Domain\Sentences\Entities\EloquentSentenceRelation;
use Modules\Personal\User\Entities\EloquentUserRelation;

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
