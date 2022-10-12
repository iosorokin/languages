<?php

namespace Modules\Domain\Sources\Structures;

use App\Base\Structures\EloquentHasDescription;
use App\Base\Structures\EloquentHasTitle;
use App\Base\Structures\Identify\IntId;
use App\Base\Structures\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Domain\Languages\Structures\EloquentLanguageRelation;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Structures\EloquentHasContainerRelation;
use Modules\Personal\User\Structures\EloquentUserRelation;

final class SourceModel extends Model implements Source
{
    use IntId;
    use EloquentUserRelation;
    use EloquentLanguageRelation;
    use Timestamps;
    use EloquentHasTitle;
    use EloquentHasDescription;
    use EloquentHasContainerRelation;

    protected $table = 'sources';

    public function setType(SourceType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): SourceType
    {
        return is_string($this->type) ? SourceType::tryFrom($this->type) : $this->type;
    }
}
