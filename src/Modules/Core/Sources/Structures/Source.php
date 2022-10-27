<?php

namespace Modules\Core\Sources\Structures;

use App\Base\Structure\EloquentHasDescription;
use App\Base\Structure\EloquentHasTitle;
use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Modules\Core\Languages\Infrastructure\Model\HasLanguage;
use Modules\Core\Sources\Enums\SourceType;
use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Model\HasContainer;
use Modules\Personal\User\Database\Eloquent\Model\HasUser;

final class Source extends Model implements Containerable
{
    use SerializesModels;

    use IntId;
    use HasUser;
    use HasLanguage;
    use Timestamps;
    use EloquentHasTitle;
    use EloquentHasDescription;
    use HasContainer;

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
