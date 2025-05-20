<?php

namespace App\Filament\Teacher\Resources;

use App\Filament\Teacher\Resources\ExerciseResource\Pages;
use App\Filament\Teacher\Resources\ExerciseResource\RelationManagers;
use App\Models\Exercise;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ExerciseResource extends Resource
{
    protected static ?string $model = Exercise::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('teacher_id')
                    ->default(Auth::id()),
                Forms\Components\Checkbox::make('all')
                    ->label('for all the groups')
                    ->default(true)
                    ->columnSpan(3)
                    ->live(),
                Forms\Components\Select::make('groups')
                    ->columnSpan(3)
                    ->visible(fn(Forms\Get $get) => !$get('all'))
                    ->options(function (){
                        return $db_groups = Auth::user()->groups->pluck('id', 'group_number')->toArray();
                    })
                    ->disabled(function(Forms\Get $get){
                        return $get('all');
                    })
                    ->multiple()
                    ->minItems(1)
                    ->required(),
                RichEditor::make('content')
                    ->columnSpan(3)
                    ->label('anouncement')
                    ->required(),
                Forms\Components\Checkbox::make('require_xml')
                    ->required()
                    ->columnSpan(1)
                    ->default(false),
                Forms\Components\Checkbox::make('require_xsd')
                    ->columnSpan(1)
                    ->default(false),
                Forms\Components\Checkbox::make('require_xslt')
                    ->required()
                    ->columnSpan(1)
                    ->default(false),
                DatePicker::make('end_at')
                    ->minDate(Carbon::today()->addDay())
                    ->required(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
