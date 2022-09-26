<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Presenters;

use App\Contracts\Contexts\Client;
use Modules\Education\Sentences\Factories\SentenceFactory;
use Modules\Education\Sentences\Repositories\SentenceRepository;
use Modules\Education\Sentences\Structures\SentenceStructure;

final class CreateSentence implements CreateSentencePresenter
{
    public function __construct(
        private SentenceFactory $factory,
        private SentenceRepository $repository,
    ) {}

    public function __invoke(array $attributes): SentenceStructure
    {
        $sentences =


        $sentence = $this->factory->new($attributes);
        $this->repository->save($sentence);

        return $sentence;
    }
}
