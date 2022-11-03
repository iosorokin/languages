<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Personality;

use App\Values\Personality\Name\Name;

final class PersonalityImp implements Personality
{
    private function __construct(
        private Name $name,
    ) {}

    public static function new(Name $name): self
    {
        $personality = new self(
            $name,
        );

        return $personality;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function compare(Personality $objectValue): bool
    {
        return $this->getName()->compare($objectValue->getName());
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name->get(),
        ];
    }
}
