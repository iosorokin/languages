<?php

namespace Modules\Personal\Auth\Services\Sanctum\Context;

use App\Contracts\Structures\AuthableStructure;
use DateTimeInterface;
use Illuminate\Support\Str;
use Laravel\Sanctum\NewAccessToken;
use Laravel\Sanctum\PersonalAccessToken;

class SanctumAuthContext
{
    private readonly string $plainTextToken;

    public function __construct(
        public readonly PersonalAccessToken $structure
    ) {
        if (! $this->structure->token) {
            $this->setToken(Str::random(40));
        }
    }

    public function setTokenable(AuthableStructure $tokenableStructure): self
    {
        $this->structure->tokenable_type = get_class($tokenableStructure);
        $this->structure->tokenable_id = $tokenableStructure->id;

        return $this;
    }

    public function setName(mixed $name): self
    {
        $this->structure->name = $name;

        return $this;
    }

    public function getPlainTextToken(): string
    {
        $token = new NewAccessToken($this->structure, $this->makePlainTextTokenString());

        return $token->plainTextToken;
    }

    private function makePlainTextTokenString(): string
    {
        return $this->structure->getKey() . '|' . $this->plainTextToken;
    }

    private function setToken(string $token): self
    {
        $this->plainTextToken = $token;
        $this->structure->token = hash('sha256', $token);

        return $this;
    }

    public function setExpiresAt(?DateTimeInterface $dateTime): self
    {
        $this->structure->expires_at = $dateTime;

        return $this;
    }
}
