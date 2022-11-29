<?php

declare(strict_types=1);

namespace App\Education\Language\Root;

use Core\Base\Model\Roles\Root;
use App\Exceptions\EntityNotFound;
use App\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\DeleteLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;
use App\Education\Language\Root\Control\Cases\Dto\UpdateLanguageDto;
use App\Education\Language\Root\Control\Cases\CreateLanguageHandler;
use App\Education\Language\Root\Control\Cases\DeleteLanguageHandler;
use App\Education\Language\Root\Control\Cases\GetLanguageHandler;
use App\Education\Language\Root\Control\Cases\GetLanguagesHandler;
use App\Education\Language\Root\Control\Cases\UpdateLanguageHandler;
use App\Education\Language\Root\Domain\Model\LanguageCollection;
use App\Education\Language\Root\Domain\Model\Language;
use App\Education\Language\Root\Domain\Policy\CanAssignOwner;
use Illuminate\Contracts\Container\BindingResolutionException;

final class RootLanguageModuleImp implements RootLanguageModule
{
    public function __construct(
        private Root $root,
    ) {}

    /**
     * @throws BindingResolutionException
     */
    public function create(CreateLanguageDto $dto): Language
    {
        /** @var CreateLanguageHandler $handler */
        $handler = app()->make(CreateLanguageHandler::class);

        return $handler($dto);
    }

    /**
     * @throws BindingResolutionException
     */
    public function update(UpdateLanguageDto $dto): void
    {
        /** @var UpdateLanguageHandler $handler */
        $handler = app()->make(UpdateLanguageHandler::class);
        $handler($dto);
    }

    /**
     * @throws BindingResolutionException
     */
    public function delete(DeleteLanguageDto $dto): void
    {
        /** @var DeleteLanguageHandler $action */
        $action = app()->make(DeleteLanguageHandler::class);
        $action($dto);
    }

    /**
     * @throws BindingResolutionException
     */
    public function find(GetLanguageDto $dto): ?Language
    {
        try {
            return $this->findOrFail($dto);
        } catch (EntityNotFound) {
            return null;
        }
    }

    /**
     * @throws EntityNotFound
     * @throws BindingResolutionException
     */
    public function findOrFail(GetLanguageDto $dto): Language
    {
        /** @var GetLanguageHandler $handler */
        $handler = app()->make(GetLanguageHandler::class);

        return $handler($dto);
    }

    /**
     * @throws BindingResolutionException
     */
    public function get(GetLanguagesDto $dto): LanguageCollection
    {
        /** @var GetLanguagesHandler $action */
        $action = app()->make(GetLanguagesHandler::class);

        return $action($dto);
    }
}
