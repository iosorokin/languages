<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Guest;

use App\Base\HasEvents;
use App\Contracts\Eventable;
use App\Values\Identificatiors\Id\BigIntIntId;
use Domain\Personal\Dto\NewUserDto;
use Domain\Personal\Entities\UserFactory;
use Domain\Personal\Events\UserRegistered;
use Domain\Personal\Repositories\PersonalRepository;

final class Register implements Eventable
{
    use HasEvents;

    public function __construct(
        private UserFactory           $userFactory,
        private PersonalRepository    $repository,
    ) {}

    public function __invoke(NewUserDto $dto): int
    {
        $user = $this->userFactory->register($dto);
        $id = $this->repository->add($user);
        $this->pushEvent(new UserRegistered(
            BigIntIntId::new($id),
            $user->baseAuth()->email())
        );

        return $id;
    }
}
