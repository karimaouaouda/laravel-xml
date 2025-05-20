<?php

namespace App\Filament\Teacher\Resources\ExerciseResource\Pages;

use App\Enums\UserRoles;
use App\Filament\Teacher\Resources\ExerciseResource;
use App\Models\Exercise;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateExercise extends CreateRecord
{
    protected static string $resource = ExerciseResource::class;

    /**
     * @throws ValidationException
     */
    protected function handleRecordCreation(array $data): Model
    {
        $isAll = $data['all'] ?? false;

        if( !($data['require_xml'] || $data['require_xsd'] || $data['require_xslt']) ){
            Notification::make()
                ->title('error when creatig exercise')
                ->body('must be at least one type is checked')
                ->danger()
                ->send();
            throw ValidationException::withMessages([
                'require_xml' => 'error when creating exercise'
            ]);
        }

        return DB::transaction(function () use ($data, $isAll) {
            $exercise = new Exercise($data);

            $exercise->save();

            $groups = $isAll ?
                Auth::user()->groups()->pluck('id')->toArray() :
                $data['groups'];

                $exercise->groups()->sync($groups);

            $groups = $exercise->groups()->get();
            $students = User::query()->where('role', UserRoles::STUDENT->value)
                ->whereAttachedTo($groups, 'group')
                ->get();


            Notification::make()
                ->title("NEW EXERCISE")
                ->body(sprintf("teacher: %s just create an exercise for you", auth()->user()->name))
                ->sendToDatabase($students);

                return $exercise;
        });
    }
}
