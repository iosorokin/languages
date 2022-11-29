<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Actions;

use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Analysis\Factories\AnalysisFactory;
use WIP\Core\Analysis\Model\Analysis;
use WIP\Core\Analysis\Policies\AnalysisPolicy;
use WIP\Core\Analysis\Validators\CreateAnalysisValidator;
use WIP\Core\Sentences\Presenters\Internal\GetSentence;
use WIP\Core\Sources\Presenters\Internal\GetSource;

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
