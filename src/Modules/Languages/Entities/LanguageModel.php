<?php

namespace Modules\Languages\Entities;

use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Personal\User\Entities\EloquentUserRelation;

class LanguageModel extends Model implements Language
{
    use EloquentUserRelation;
    use EloquentId;
    use EloquentTimestamps;

    protected $table = 'languages';

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setNativeName(string $name): self
    {
        $this->native_name = $name;

        return $this;
    }

    public function getNativeName(): string
    {
        return $this->native_name;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
