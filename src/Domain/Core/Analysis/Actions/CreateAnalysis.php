<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Actions;

use Domain\Core\Analysis\Factories\AnalysisFactory;
use Domain\Core\Analysis\Model\Analysis;
use Domain\Core\Analysis\Policies\AnalysisPolicy;
use Domain\Core\Analysis\Validators\CreateAnalysisValidator;
use Domain\Core\Sentences\Presenters\Internal\GetSentence;
use Domain\Core\Sources\Presenters\Internal\GetSource;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class CreateAnalysis
{
    public function __construct(
        private CreateAnalysisValidator $validator,
        private GetSentence             $getSentence,
        private GetSource               $getSource,
        private AnalysisPolicy          $policy,
        private AnalysisFactory         $factory,
    ) {}

    public function __invoke(EloquentUserModel $user, array $attributes): Analysis
    {
        $attributes = $this->validator->validate($attributes);
        $sentence = $this->getSentence->getOrThrowBadRequest((int) $attributes['sentence_id']);
        $source = $this->getSource->getOrThrowException($sentence->source_id);
        $sentence->source()->associate($source);
        $this->policy->canCreate($user, $sentence);
        $analysis = $this->factory->create($sentence, $user, $attributes);
        $analysis->save();

        return $analysis;
    }
}
