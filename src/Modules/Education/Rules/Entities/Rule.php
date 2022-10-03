<?php

namespace Modules\Education\Rules\Entities;

use Illuminate\Support\Carbon;
use Modules\Languages\Entity\Language;
use Modules\Personal\User\Entities\User;

interface Rule
{
    public function getId(): int;

    public function setLanguage(Language $language): self;

    public function getLanguage(): Language;

    public function setUser(User $user): self;

    public function getUser(): User;

    public function setTitle(string $title): self;

    public function getTitle(): string;

    public function setDescription(string $description): self;

    public function getDescription(): string;

    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): Carbon;}
