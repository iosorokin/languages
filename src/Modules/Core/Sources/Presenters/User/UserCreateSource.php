<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Presenters\User;

use Modules\Core\Sources\Actions\CreateSource;
use Modules\Core\Sources\Entities\Source;
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
