<?php

declare(strict_types=1);

namespace Domain\Analysis\Actions;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Analysis\Factories\AnalysisFactory;
use Domain\Analysis\Model\Analysis;
use Domain\Analysis\Policies\AnalysisPolicy;
use Domain\Analysis\Validators\CreateAnalysisValidator;
use Domain\Sentences\Presenters\Internal\GetSentence;
use Domain\Sources\Presenters\Internal\GetSource;

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
