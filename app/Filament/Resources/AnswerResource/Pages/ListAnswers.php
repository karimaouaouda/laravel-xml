<?php

namespace App\Filament\Resources\AnswerResource\Pages;

use App\Filament\Resources\AnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnswers extends ListRecords
{
    protected static string $resource = AnswerResource::class;

    public static function getColumnSpan(){
        return 'full';
    }
    public static function getColumnStart(){
        return '1';
    }

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
