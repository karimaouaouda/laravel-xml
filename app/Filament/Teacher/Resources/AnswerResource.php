<?php

namespace App\Filament\Teacher\Resources;

use App\Filament\Teacher\Resources\AnswerResource\Pages;
use App\Filament\Teacher\Resources\AnswerResource\RelationManagers;
use App\Models\Answer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->prefix('#')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('student.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('exercise.id')
                    ->badge()
                    ->prefix('exo: #')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('answer date')
                    ->badge()
                    ->color(Color::Green)
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextInputColumn::make('note')
                    ->sortable()
                    ->default('0')
                    ->width('40px')
                    ->rules(['numeric']),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('view exo')
                    ->icon('heroicon-o-eye')
                    ->modal()
                    ->modalContent(function(Answer $record) {
                        return view('filament.resources.exercise-resource.widgets.exercise-widget', [
                            'exercise' => $record->exercise,
                        ]);
                    }),
                Tables\Actions\Action::make('view solution')
                    ->icon('heroicon-o-eye')
                    ->modal()
                    ->modalContent(function(Answer $record) {
                        return view('filament.resources.exercise-resource.widgets.exercise-widget', [
                            'exercise' => $record,
                            'title' => 'the solution'
                        ]);
                    })

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnswers::route('/'),
            'create' => Pages\CreateAnswer::route('/create'),
            'edit' => Pages\EditAnswer::route('/{record}/edit'),
        ];
    }
}
