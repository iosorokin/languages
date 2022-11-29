<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Presenters\Mixins;

use App\Sentences\Repositories\SentenceRepository;
use Illuminate\Support\Facades\Validator;
use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use Core\Infrastructure\Support\Validation\Rules\BigIntId;
use WIP\Core\Sentences\Policies\SentencePolicy;
use WIP\Core\Sentences\Presenters\Internal\GetSentence;

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
