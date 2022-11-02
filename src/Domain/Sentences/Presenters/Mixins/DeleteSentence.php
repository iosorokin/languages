<?php

declare(strict_types=1);

namespace Domain\Sentences\Presenters\Mixins;

use App\Rules\BigIntId;
use Illuminate\Support\Facades\Validator;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Sentences\Policies\SentencePolicy;
use Domain\Sentences\Presenters\Internal\GetSentence;
use Domain\Sentences\Repositories\SentenceRepository;

final class DeleteSentence
{
    public function __construct(
        private GetSentence $getSentence,
        private SentencePolicy $policy,
        private SentenceRepository $sentenceRepository,
    ) {}

    public function __invoke(EloquentUserModel $user, array $attributes): void
    {
        $attributes = Validator::validate($attributes, ['sentence_id' => ['required', new BigIntId()]]);
        $sentence = ($this->getSentence)($attributes['sentence_id']);
        $this->policy->canDelete($user, $sentence);
        $this->sentenceRepository->delete($sentence);
    }
}
