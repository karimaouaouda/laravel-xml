<?php

namespace App\Filament\Teacher\Resources\ExerciseResource\Pages;

use App\Filament\Teacher\Resources\ExerciseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExercises extends ListRecords
{
    protected static string $resource = ExerciseResource::class;

    protected int | string | array $columnSpan = 'full';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    public function getColumnSpan(): int|array|string
    {
        return $this->columnSpan;
    }

    public static function getColumnStart(){
        return '1';
    }
}
