<?php

declare(strict_types=1);

namespace App\Education\Language\Base;

use App\Exceptions\EntityNotFound;
use App\Education\Language\Base\Control\Query\FindLanguage;
use App\Education\Language\Base\Control\Query\GetLanguages;
use App\Education\Language\Base\Model\Aggregate\ReadonlyLanguage;
use App\Education\Language\Base\Model\Collection\LanguageCollection;
use App\Education\Language\Root\Control\Cases\GetLanguageHandler;
use App\Education\Language\Root\Control\Cases\GetLanguagesHandler;
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
        /** @var GetLanguageHandler $handler */
        $handler = app()->make(GetLanguageHandler::class);

        return $handler($query);
    }

    /**
     * @throws BindingResolutionException
     */
    public function get(GetLanguages $query): LanguageCollection
    {
        /** @var GetLanguagesHandler $handler */
        $handler = app()->make(GetLanguagesHandler::class);

        return $handler($query);
    }

    /**
     * @throws BindingResolutionException
     */
    public static function instance(): LanguageModule
    {
        return app()->make(self::class);
    }
}
