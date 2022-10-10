<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Actions;

use App\Rules\BigIntId;
use Illuminate\Support\Facades\Validator;
use Modules\Domain\Sentences\Policies\SentencePolicy;
use Modules\Domain\Sentences\Presenters\Internal\GetSentencePresenter;
use Modules\Domain\Sentences\Repositories\SentenceRepository;
use Modules\Personal\Auth\Contexts\Client;

final class DeleteSentence
{
    public function __construct(
        private GetSentencePresenter $getSentence,
        private SentencePolicy $policy,
        private SentenceRepository $sentenceRepository,
    ) {}

    public function __invoke(Client $client, array $attributes): void
    {
        $attributes = Validator::validate($attributes, ['sentence_id' => ['required', new BigIntId()]]);
        $sentence = ($this->getSentence)($attributes['sentence_id']);
        $this->policy->canDelete($client, $sentence);
        $this->sentenceRepository->delete($sentence);
    }
}
