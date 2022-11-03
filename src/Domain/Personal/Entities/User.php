<?php

declare(strict_types=1);

namespace Domain\Personal\Entities;

use App\Base\HasEvents;
use App\Contracts\Eventable;
use App\Values\Datetime\DefaultTimestamps;
use App\Values\Identificatiors\Id\IntId;
use Domain\Personal\Values\Accesses\Access;
use Domain\Personal\Values\Accesses\Accesses;
use Domain\Personal\Values\BaseAuth\BaseAuthImp;
use Domain\Personal\Values\Personality\Personality;

final class User implements Eventable
{
    use HasEvents;

    public function __construct(
        private IntId             $id,
        private Personality       $personality,
        private Accesses          $accesses,
        private BaseAuthImp       $baseAuth,
        private DefaultTimestamps $timestamps,
    ) {}

    public function getId(): IntId
    {
        return $this->id;
    }

    public function id(IntId $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function accesses(): Accesses
    {
        return clone $this->accesses;
    }

    public function setAccesses(Accesses $accesses): self
    {
        $this->accesses = $accesses;

        return $this;
    }

    public function confirm(): self
    {
        $this->accesses->addAccess(Access::User);

        return $this;
    }

    public function personality(): Personality
    {
        return $this->personality;
    }

    public function setPersonality(Personality $personality): self
    {
        $this->name = isset($this->personality) && $this->personality->compare($personality)
            ? $personality
            : $this->personality;

        return $this;
    }

    public function setBaseAuth(BaseAuthImp $baseAuth): self
    {
        $this->baseAuth = $baseAuth;
        $this->baseAuth->secure();

        return $this;
    }

    public function baseAuth(): BaseAuthImp
    {
        return $this->baseAuth;
    }

    public function setTimestamps(DefaultTimestamps $timestamps): self
    {
        $this->timestamps = $timestamps;

        return $this;
    }

    public function timestamps(): DefaultTimestamps
    {
        return $this->timestamps;
    }
}
