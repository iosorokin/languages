<?php

declare(strict_types=1);

namespace Modules\Education\Words\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\CreateableWords;
use App\Contracts\Presenters\Education\Word\CreateWordPresenter;
use App\Contracts\Structures\WordStructure;
use Modules\Education\Words\Models\WordModel;
use Modules\Education\Words\Repositories\WordRepository;

final class GetOrCreateWord implements CreateWordPresenter
{
    public function __construct(
        private WordRepository $repository,
    ) {}

    public function __invoke(Client $client, string $word): ?WordStructure
    {
        $structure = $this->createWordModel($client->getStructure(), $word);
        $structure = $this->getOrCreate($structure);

        return $structure;
    }

    private function createWordModel(CreateableWords $author, string $word): WordStructure
    {
        $model = new WordModel();
        $model->word = $word;
        $model->setCreator($author);

        return $model;
    }

    private function getOrCreate(WordModel $word): WordStructure
    {
        return $this->repository->getOrCreate($word);
    }
}
