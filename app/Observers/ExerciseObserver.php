<?php

namespace App\Observers;

use App\Enums\UserRoles;
use App\Models\Exercise;
use App\Models\User;
use Filament\Notifications\Notification;

class ExerciseObserver
{
    /**
     * Handle the Exercise "created" event.
     */
    public function created(Exercise $exercise): void
    {

    }

    /**
     * Handle the Exercise "updated" event.
     */
    public function updated(Exercise $exercise): void
    {
        //
    }

    /**
     * Handle the Exercise "deleted" event.
     */
    public function deleted(Exercise $exercise): void
    {
        //
    }

    /**
     * Handle the Exercise "restored" event.
     */
    public function restored(Exercise $exercise): void
    {
        //
    }

    /**
     * Handle the Exercise "force deleted" event.
     */
    public function forceDeleted(Exercise $exercise): void
    {
        //
    }
}
