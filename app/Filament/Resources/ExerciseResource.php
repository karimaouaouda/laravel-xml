<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnswerResource\Pages\CreateAnswer;
use App\Filament\Resources\ExerciseResource\Pages;
use App\Filament\Resources\ExerciseResource\RelationManagers;
use App\Models\Exercise;
use App\Models\Group;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ExerciseResource extends Resource
{
    protected static ?string $model = Exercise::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $student_group = Auth::user()->group->first();


        return Exercise::query()->whereIn('id', $student_group->exercises->pluck('id')->toArray());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->prefix('#')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teacher.name')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('date de creation')
                    ->dateTime()
                    ->badge()
                    ->color(Color::Blue),
                Tables\Columns\TextColumn::make('end_at')
                    ->dateTime()
                    ->badge()
                    ->color(Color::Red),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('solve')
                    ->icon('heroicon-o-pencil')
                    ->color(Color::Green)
                    ->openUrlInNewTab()
                    ->url(function(Exercise $record){
                        return CreateAnswer::getUrl([
                            'exercise' => $record->getAttribute('id'),
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
            'index' => Pages\ListExercises::route('/'),
            'create' => Pages\CreateExercise::route('/create'),
            'edit' => Pages\EditExercise::route('/{record}/edit'),
        ];
    }
}
