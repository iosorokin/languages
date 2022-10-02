<?php

declare(strict_types=1);

namespace Modules\Education\Source\Actions;

use Modules\Education\Source\Entity\SourceModel;
use Modules\Education\Source\Factory\SourceFactory;
use Modules\Education\Source\Repositories\SourceRepository;
use Modules\Languages\Entity\Language;
use Modules\Personal\User\Entities\User;

final class CreateSource
{
    public function __construct(
        private SourceFactory $factory,
        private SourceRepository   $repository,
    ) {}

    public function __invoke(User $user, Language $language, array $attributes): SourceModel
    {
        $source = $this->factory->new($user, $language, $attributes);
        $this->repository->save($source);

        return $source;
    }
}
