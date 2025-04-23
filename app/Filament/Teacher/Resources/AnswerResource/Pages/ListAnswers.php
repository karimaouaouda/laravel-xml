<?php

namespace App\Filament\Teacher\Resources\AnswerResource\Pages;

use App\Filament\Teacher\Resources\AnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnswers extends ListRecords
{
    protected static string $resource = AnswerResource::class;

//    public function getColumnSpan(){
//        return 'full';
//    }

    public static function getColumnSpan(){
        return 'full';
    }
    public static function getColumnStart(){
        return '1';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
