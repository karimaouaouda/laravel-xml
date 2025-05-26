<?php

namespace App\Traits;

use App\Enums\UserRoles;
use App\Models\User;

trait HasRoles
{
    public function isStudent(): bool
    {
        return $this->getAttribute('role') === UserRoles::STUDENT;
    }

    public function isTeacher(): bool
    {
        return $this->getAttribute('role') === UserRoles::TEACHER;
    }

    public function isAdmin(): bool
    {
        return $this->getAttribute('role') === UserRoles::ADMIN;
    }

    public function isSuperAdmin(): bool
    {
        return $this->getAttribute('role') === UserRoles::SUPER_ADMIN;
    }
    // get role
    public function getRole(): string
    {
        return $this->getAttribute('role');
    }
}
