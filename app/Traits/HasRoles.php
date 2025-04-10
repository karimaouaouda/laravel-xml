<?php

namespace App\Traits;

use App\Enums\UserRoles;
use App\Models\User;

trait HasRoles
{
    public function isStudent(): bool
    {
        return $this->role === UserRoles::STUDENT;
    }

    public function isTeacher(): bool
    {
        return $this->role === UserRoles::TEACHER;
    }

    public function isAdmin(): bool
    {
        return $this->role === UserRoles::ADMIN;
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === UserRoles::SUPER_ADMIN;
    }
    // get role
    public function getRole(): string
    {
        return $this->role;
    }
}
