<?php

namespace App\Filament\Teacher\Pages;

use Filament\Pages\Auth\Login;
use Filament\Pages\Page;

class TeacherLogin extends Login
{
    public function hasLogo(): bool
    {
        return false;
    }
}
