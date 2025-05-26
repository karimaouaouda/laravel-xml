<?php

namespace App\Filament\Pages;

use App\Enums\UserRoles;
use Filament\Forms\Components\Hidden;
use Filament\Pages\Auth\Register;

class StudentRegister extends Register
{
    public function hasLogo(): bool
    {
        return false;
    }

    /**
     * @return array<int | string, string | Form>
     */
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getRoleFormComponent(),
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    public function getRoleFormComponent(){
        return Hidden::make('role')
            ->default(UserRoles::STUDENT->value);
    }
}
