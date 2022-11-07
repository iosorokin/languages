<?php

namespace Domain\Core\Sources\Structures;

use App\Base\Structure\EloquentHasDescription;
use App\Base\Structure\EloquentHasTitle;
use App\Base\Structure\Identify\IntId;
use App\Base\Structure\Timestamps\Timestamps;
use Domain\Core\Sources\Enums\SourceType;
use Domain\Internal\Container\Contracts\Containerable;
use Domain\Internal\Container\Model\HasContainer;
use Domain\Languages\Infrastructure\Model\HasLanguage;
use Domain\Account\User\Database\Eloquent\Model\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;

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
