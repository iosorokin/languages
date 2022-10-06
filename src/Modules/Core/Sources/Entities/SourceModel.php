<?php

namespace Modules\Core\Sources\Entities;

use App\Base\Entity\EloquentHasDescription;
use App\Base\Entity\EloquentHasTitle;
use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Container\Entites\EloquentHasContainerRelation;
use Modules\Core\Languages\Entities\EloquentLanguageRelation;
use Modules\Core\Sources\Enums\SourceType;
use Modules\Personal\User\Entities\EloquentUserRelation;

final class SourceModel extends Model implements Source
{
    use EloquentId;
    use EloquentUserRelation;
    use EloquentLanguageRelation;
    use EloquentTimestamps;
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
