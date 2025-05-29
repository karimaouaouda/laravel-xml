<?php

namespace App\Filament\Pages;

use App\Enums\UserRoles;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
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
                        $this->getFirstNameComponent(),
                        $this->getLastNameComponent(),
                        $this->getRoleFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    private function getFirstNameComponent(): TextInput
    {
        return TextInput::make('first_name')
            ->label('First Name')
            ->alpha()
            ->required()
            ->minLength(3);
    }

    private function getLastNameComponent(): TextInput
    {
        return TextInput::make('last_name')
            ->label('Last Name')
            ->required()
            ->alpha()
            ->minLength(3);
    }

    public function getRoleFormComponent(): Hidden
    {
        return Hidden::make('role')
            ->default(UserRoles::STUDENT->value);
    }
}
