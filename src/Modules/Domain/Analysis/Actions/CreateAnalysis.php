<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Actions;

use Modules\Domain\Analysis\Entities\Analysis;
use Modules\Domain\Analysis\Factories\AnalysisFactory;
use Modules\Domain\Analysis\Policies\AnalysisPolicy;
use Modules\Domain\Analysis\Repositories\AnalysisRepository;
use Modules\Domain\Analysis\Validators\CreateAnalysisValidator;
use Modules\Domain\Sentences\Presenters\Internal\GetSentencePresenter;
use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;

final class CreateAnalysis
{
    public function __construct(
        private CreateAnalysisValidator $validator,
        private GetUserPresenter        $getUser,
        private GetClientPresenter      $getClient,
        private GetSentencePresenter    $getSentence,
        private GetSourcePresenter      $getSource,
        private AnalysisPolicy          $policy,
        private AnalysisFactory         $factory,
        private AnalysisRepository      $repository,
    ) {}

    public function __invoke(Client $client, array $attributes): Analysis
    {
        $attributes = $this->validator->validate($attributes);
        $user = ($this->getUser)($attributes['user_id']);
        if ($user->getId() !== $client->id()) {
            $client = ($this->getClient)($user);
        }
        $sentence = $this->getSentence->getOrThrowBadRequest((int) $attributes['sentence_id']);
        $source = $this->getSource->getOrThrowException($sentence->getSourceId());
        $sentence->setSource($source);
        $this->policy->canCreate($client, $sentence);
        $analysis = $this->factory->create($sentence, $user, $attributes);
        $this->repository->save($analysis);

        return $analysis;
    }
}
