<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root;

use App\Base\Model\Roles\Root;
use App\Controll\Language\Root\CreateLanguageImp;
use App\Controll\Language\Root\DeleteLanguageImp;
use App\Controll\Language\Root\UpdateLanguageCommand;
use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Model\Collection\ReadonlyLanguageCollection;
use Domain\Core\Language\Root\Control\Commands\CreateLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\UpdateLanguageHandler;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguageHandler;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguageImp;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguagesHandler;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguagesImp;
use Illuminate\Contracts\Container\BindingResolutionException;

final class RootLanguageModuleImp implements RootLanguageModule
{
    /**
     * @throws BindingResolutionException
     */
    public function create(CreateLanguageImp $command): ReadonlyLanguage
    {
        /** @var CreateLanguageHandler $handler */
        $handler = app()->make(CreateLanguageHandler::class);

        return $handler($root, $command);
    }

    /**
     * @throws BindingResolutionException
     */
    public function update(Root $root, UpdateLanguageCommand $command): void
    {
        /** @var UpdateLanguageHandler $action */
        $action = app()->make(UpdateLanguageHandler::class);
        $action($root, $command);
    }

    /**
     * @throws BindingResolutionException
     */
    public function delete(Root $root, DeleteLanguageImp $command): void
    {
        /** @var DeleteLanguageHandler $action */
        $action = app()->make(DeleteLanguageHandler::class);
        $action($root, $command);
    }

    /**
     * @throws BindingResolutionException
     */
    public function find(Root $root, RootFindLanguageImp $query): ?ReadonlyLanguage
    {
        try {
            return $this->findOrFail($root, $query);
        } catch (EntityNotFound) {
            return null;
        }
    }

    /**
     * @throws EntityNotFound
     * @throws BindingResolutionException
     */
    public function findOrFail(Root $root, RootFindLanguageImp $query): ReadonlyLanguage
    {
        /** @var RootFindLanguageHandler $action */
        $action = app()->make(RootFindLanguageHandler::class);

        return $action($root, $query);
    }

    /**
     * @throws BindingResolutionException
     */
    public function get(Root $root, RootGetLanguagesImp $query): ReadonlyLanguageCollection
    {
        /** @var RootGetLanguagesHandler $action */
        $action = app()->make(RootGetLanguagesHandler::class);

        return $action($root, $query);
    }
}
