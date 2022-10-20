<?php

namespace Modules\Domain\Sources\Structures;

use App\Base\Structure\EloquentHasDescription;
use App\Base\Structure\EloquentHasTitle;
use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Modules\Domain\Languages\Structures\EloquentLanguageRelation;
use Modules\Domain\Sources\Enums\SourceType;
use Modules\Internal\Container\Structures\EloquentHasContainerRelation;
use Modules\Personal\User\Structures\EloquentUserRelation;

final class SourceModel extends Model implements Source
{
    use SerializesModels;

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
