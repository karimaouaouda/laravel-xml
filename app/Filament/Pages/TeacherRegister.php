<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Pages\Auth\Register;

class TeacherRegister extends Register
{
    public function hasLogo(): bool
    {
        return false;
    }
}
