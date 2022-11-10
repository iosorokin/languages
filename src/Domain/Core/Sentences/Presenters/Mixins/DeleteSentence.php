<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Presenters\Mixins;

use App\Support\Validation\Rules\BigIntId;
use Domain\Core\Sentences\Policies\SentencePolicy;
use Domain\Core\Sentences\Presenters\Internal\GetSentence;
use Domain\Sentences\Repositories\SentenceRepository;
use Illuminate\Support\Facades\Validator;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

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
