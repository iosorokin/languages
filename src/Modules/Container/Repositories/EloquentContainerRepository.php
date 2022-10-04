<?php

declare(strict_types=1);

namespace Modules\Container\Repositories;

use App\Extensions\Assert;
use Core\Services\Morph\Morph;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Container\Entites\ContainerElementModel;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Entites\ContainerModel;
use Modules\Container\Entites\Container;
use Modules\Education\Rules\Entities\RuleModel;
use Modules\Education\Sentences\Entities\SentenceModel;

final class EloquentContainerRepository implements ContainerRepository
{
    public function save(Container $container): void
    {
        $container->save();
    }

    public function get(int $id): ?Container
    {
        return ContainerModel::find($id);
    }

    public function hasElement(Container $container, ContainerElement $element): bool
    {
        return (bool)ContainerModel::query()
            ->whereHasMorph(
                'elements',
                [RuleModel::class, SentenceModel::class, ContainerModel::class],
                function (Builder $query) use ($element) {
                    $query->where('element_id', $element->getId())
                        ->where('element_type', Morph::getMorph($element));
                }
            )->first();
    }

    public function saveElement(ContainerElement $element): void
    {
        $element->save();
    }

    public function getLastPosition(int $containerId): ?int
    {
        return DB::query()
            ->select('position')
            ->from((new ContainerElementModel())->getTable())
            ->where('container_id', $containerId)
            ->orderBy('position')
            ->limit(1)
            ->first()
            ?->position;
    }

    public function getContainerWithDependenses(int $id): Container
    {
        /** @var ContainerModel $container */
        $container = ContainerModel::query()
            ->with('containerable')
            ->find($id);

        return $container;
    }
}
