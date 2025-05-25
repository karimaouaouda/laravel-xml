<?php

namespace App\Filament\Pages;

use Filament\Pages\Auth\Login;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class StudentLogin extends Login
{

    public function hasLogo(): bool
    {
        return false;
    }
}
