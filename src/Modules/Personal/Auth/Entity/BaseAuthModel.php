<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Entity;

use App\Base\Entity\Identify\IntId;
use App\Base\Entity\Timestamps\Timestamps;
use Illuminate\Database\Eloquent\Model;
use Modules\Personal\User\Entities\EloquentUserRelation;

final class BaseAuthModel extends Model implements
    BaseAuth
{
    use IntId;
    use Timestamps;
    use EloquentUserRelation;

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
