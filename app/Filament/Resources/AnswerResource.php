<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnswerResource\Pages;
use App\Filament\Resources\AnswerResource\RelationManagers;
use App\Models\Answer;
use App\Models\Exercise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static Exercise $exercise;

    public static function getEloquentQuery(): Builder
    {
        return Answer::query()->where('student_id', Auth::id());
    }

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
                    ->color(Color::Blue)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('date submission')
                    ->badge()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('note')
                    ->default('x')
                    ->badge()
                    ->color(function($state){
                        if( $state == 'x' ){
                            return Color::Gray;
                        }
                        if( $state < 10 ){
                            return Color::Red;
                        }

                        if( $state < 15 ){
                            return Color::Blue;
                        }

                        return Color::Green;
                    })
                    ->formatStateUsing(fn ($state): string => $state . '/20'),
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
            'create' => Pages\CreateAnswer::route('/{exercise}/create'),
            'edit' => Pages\EditAnswer::route('/{record}/edit'),
        ];
    }
}
