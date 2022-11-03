<?php

declare(strict_types=1);

namespace Domain\Personal\Entities;

use App\Values\Datetime\DefaultTimestamps;
use App\Values\Datetime\StrictNullTimestamp;
use App\Values\Identificatiors\Id\IntId;
use App\Values\Identificatiors\Id\StrictNullId;
use Domain\Personal\Dto\PersonalDto;
use Domain\Personal\Values\Accesses\Access;
use Domain\Personal\Values\Accesses\Accesses;
use Domain\Personal\Values\Accesses\NewAccesses;
use Domain\Personal\Values\BaseAuth\Email\UserEmail;
use Domain\Personal\Values\BaseAuth\NewBaseAuth;
use Domain\Personal\Values\BaseAuth\Password\RawPassword;
use Domain\Personal\Values\Personality\Name\UserName;
use Domain\Personal\Values\Personality\Personality;
use Domain\Personal\Values\Personality\PersonalityImp;

final class User implements Personal
{
    private function __construct(
        private IntId             $id,
        private Personality       $personality,
        private Accesses          $accesses,
        private NewBaseAuth       $baseAuth,
        private DefaultTimestamps $timestamps,
    )
    {
        $this->baseAuth->secure();
    }

    public static function make(PersonalDto $dto): self
    {
        $peronal = new static(
            id: StrictNullId::new(),
            personality: PersonalityImp::new(
                UserName::new($dto->getName())
            ),
            accesses: NewAccesses::make([]),
            baseAuth: NewBaseAuth::new(
                UserEmail::new($dto->getEmail()),
                RawPassword::newHashed($dto->getPassword())
            ),
            timestamps: DefaultTimestamps::new(
                createdAt: StrictNullTimestamp::new(),
                updatedAt: StrictNullTimestamp::new(),
            )
        );

        return $peronal;
    }

    public function update(PersonalDto $dto): self
    {
        $this->setPersonality(
            PersonalityImp::new(
                UserName::new($dto->getName())
            )
        );

        return $this;
    }

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

    public function setBaseAuth(NewBaseAuth $baseAuth): self
    {
        $this->baseAuth = $baseAuth;

        return $this;
    }

    public function baseAuth(): NewBaseAuth
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
