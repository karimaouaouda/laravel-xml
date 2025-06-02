<?php

namespace App\Filament\Teacher\Resources\ExerciseResource\Pages;

use App\Filament\Teacher\Resources\ExerciseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\RichEditor;

class EditExercise extends EditRecord
{
    protected static string $resource = ExerciseResource::class;

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Hidden::make('teacher_id')
                    ->default(Auth::id()),
                RichEditor::make('content')
                    ->columnSpan(3)
                    ->label('anouncement')
                    ->required(),
                DatePicker::make('end_at')
                    ->minDate(Carbon::today()->addDay())
                    ->required(),
            ])->columns(3);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
