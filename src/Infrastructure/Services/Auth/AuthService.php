<?php

namespace Infrastructure\Services\Auth;

interface AuthService
{
    public function login(AuthUser $user): ?string;

    public function logout(AuthUser $user): void;

    public function getAuth(): ?AuthUser;
}
