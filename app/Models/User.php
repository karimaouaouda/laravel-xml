<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRoles;
use App\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable implements FilamentUser, HasName, HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getNameAttribute(){
        return $this->first_name . " " . $this->last_name;
    }

    public function setGroupAttribute($group_id): \Illuminate\Http\JsonResponse
    {
        if( $this->isTeacher() ){
            throw new \Exception('You can not set a group for a teacher');
        }

        $this->group()->sync([$group_id]);

        return response()->json(['message' => 'Group set successfully']);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRoles::class,
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }


    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Group::class,
            'students_groups',
            'student_id',
            'group_id'
            )
            ->withPivot(['group_id', 'student_id']);
    }

    public function groups(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Group::class, 'teacher_id');
    }

    /**
     * @throws \Exception
     */
    public function canAccessPanel(Panel $panel): bool
    {

        return $this->getAttribute('role')->value == $panel->getId();
    }

    public function answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Answer::class , 'student_id');
    }

    public function exercises(){
        return $this->hasMany(Exercise::class, 'teacher_id');
    }

    public function solved(int|string $exo_id): bool
    {
        return $this->answers()->where('exercise_id', $exo_id)->exists();
    }

    public function getFilamentName(): string
    {
        return $this->getAttribute('first_name') . ' ' . $this->getAttribute('last_name');
    }

    public function getFilamentAvatarUrl(): ?string
    {
       // return default profile picture
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->getFilamentName()) . '&background=random&size=128';
    }
}
