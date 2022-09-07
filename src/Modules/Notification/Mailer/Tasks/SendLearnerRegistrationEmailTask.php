<?php

namespace Modules\Notification\Mailer\Tasks;

use Illuminate\Support\Arr;

class SendLearnerRegistrationEmailTask
{
    private ?string $email;

    public function __invoke()
    {

    }

    public static function new(array $attributes): self
    {
        $dto = new self();
        $dto->setEmail(Arr::get($attributes, 'email'));

        return $dto;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }


}
