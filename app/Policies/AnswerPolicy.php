<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnswerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Answer $answer): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isStudent();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Answer $answer): bool|Response
    {
        return $user->isTeacher() && $user->id === $answer->student_id
            ? Response::allow()
            : Response::deny('You do not own this answer.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Answer $answer): Response
    {
        return $user->isTeacher() && $user->id === $answer->student_id
            ? Response::allow()
            : Response::deny('You do not own this answer.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Answer $answer): Response
    {
        return $user->isTeacher() && $user->id === $answer->student_id
        ? Response::allow()
        : Response::deny('You do not own this answer.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Answer $answer): Response
    {
        return $user->isTeacher() && $user->id === $answer->student_id
        ? Response::allow()
        : Response::deny('You do not own this answer.');
    }
}
