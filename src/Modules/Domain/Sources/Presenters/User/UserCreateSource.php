<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\User;

use Modules\Domain\Sources\Actions\CreateSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserCreateSource implements UserCreateSourcePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private CreateSource $createSource,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(array $attributes): Source
    {
        $client = ($this->getClient)();
        $source = ($this->createSource)($client, $attributes);

        return $source;
    }
}
