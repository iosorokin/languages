<?php

namespace WIP\Core\Sources\Structures;

use Core\Base\Structure\EloquentHasDescription;
use Core\Base\Structure\EloquentHasTitle;
use Core\Base\Structure\Identify\IntId;
use Core\Base\Structure\Timestamps\Timestamps;
use Domain\Account\User\Database\Eloquent\Model\HasUser;
use Domain\Languages\Infrastructure\Model\HasLanguage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use WIP\Core\Sources\Enums\SourceType;
use WIP\Internal\Container\Contracts\Containerable;
use WIP\Internal\Container\Model\HasContainer;

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
