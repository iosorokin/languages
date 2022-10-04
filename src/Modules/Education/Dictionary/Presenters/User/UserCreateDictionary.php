<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Presenters\User;

use Modules\Education\Dictionary\Actions\CreateDictionary;
use Modules\Education\Dictionary\Entities\Dictionary;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserCreateDictionary implements UserCreateDictionaryPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private CreateDictionary $createDictionary,
    ) {}

    public function __invoke(array $attributes): Dictionary
    {
        $client = ($this->getClient)();
        $dictionary = ($this->createDictionary)($client, $attributes);

        return $dictionary;
    }
}
