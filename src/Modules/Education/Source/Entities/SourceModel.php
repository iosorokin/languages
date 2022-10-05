<?php

namespace Modules\Education\Source\Entities;

use App\Base\Entity\EloquentHasDescription;
use App\Base\Entity\EloquentHasTitle;
use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Container\Entites\EloquentHasContainerRelation;
use Modules\Education\Source\Enums\SourceType;
use Modules\Languages\Entities\EloquentLanguageRelation;
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
