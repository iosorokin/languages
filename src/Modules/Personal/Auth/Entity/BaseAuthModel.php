<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Entity;

use App\Base\Entity\Identify\EloquentId;
use App\Base\Entity\Timestamps\EloquentTimestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Personal\User\Entities\EloquentHasUser;

final class BaseAuthModel extends Model implements
    BaseAuth
{
    use EloquentId;
    use EloquentTimestamps;
    use EloquentHasUser;

    protected $table = 'base_auths';

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
