<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\Control\Query\FindLanguageHandler;
use Domain\Core\Language\Base\Control\Query\GetLanguages;
use Domain\Core\Language\Base\Control\Query\GetLanguagesHandler;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Model\Collection\ReadonlyLanguageCollection;
use Illuminate\Contracts\Container\BindingResolutionException;

final class LanguageModuleImp implements LanguageModule
{
    /**
     * @throws BindingResolutionException
     */
    public function find(FindLanguage $query): ?ReadonlyLanguage
    {
        try {
            return $this->findOrFail($query);
        } catch (EntityNotFound) {
            return null;
        }
    }

    /**
     * @throws EntityNotFound
     * @throws BindingResolutionException
     */
    public function findOrFail(FindLanguage $query): ReadonlyLanguage
    {
        /** @var FindLanguageHandler $handler */
        $handler = app()->make(FindLanguageHandler::class);

        return $handler($query);
    }

    /**
     * @throws BindingResolutionException
     */
    public function get(GetLanguages $query): ReadonlyLanguageCollection
    {
        /** @var GetLanguagesHandler $handler */
        $handler = app()->make(GetLanguagesHandler::class);

        return $handler($query);
    }
}
