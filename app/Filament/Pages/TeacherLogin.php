<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Pages\Auth\Login;

class TeacherLogin extends Login
{
    public function hasLogo(): bool
    {
        return false;
    }
}
