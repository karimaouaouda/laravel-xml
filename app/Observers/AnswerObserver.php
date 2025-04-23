<?php

namespace App\Observers;

use App\Models\Answer;
use Filament\Notifications\Notification;

class AnswerObserver
{
    /**
     * Handle the Answer "created" event.
     */
    public function created(Answer $answer): void
    {
        $teacher = $answer->exercise->teacher;

        Notification::make()
            ->title('new answer')
            ->body(sprintf("new answer from student: %s , see it!", $answer->student->name))
            ->sendToDatabase($teacher);
    }

    /**
     * Handle the Answer "updated" event.
     */
    public function updated(Answer $answer): void
    {
        //
    }

    /**
     * Handle the Answer "deleted" event.
     */
    public function deleted(Answer $answer): void
    {
        //
    }

    /**
     * Handle the Answer "restored" event.
     */
    public function restored(Answer $answer): void
    {
        //
    }

    /**
     * Handle the Answer "force deleted" event.
     */
    public function forceDeleted(Answer $answer): void
    {
        //
    }
}
