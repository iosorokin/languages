<?php

namespace Modules\Domain\Sources\Entities;

use App\Base\Entity\EloquentHasDescription;
use App\Base\Entity\EloquentHasTitle;
use App\Base\Entity\Identify\IntId;
use App\Base\Entity\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Domain\Languages\Entities\EloquentLanguageRelation;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Entites\EloquentHasContainerRelation;
use Modules\Personal\User\Entities\EloquentUserRelation;

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
